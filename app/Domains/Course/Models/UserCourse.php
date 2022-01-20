<?php
namespace Domains\Course\Models;

use Domains\Auth\Models\User;
use Domains\Payment\Models\Payment;
use Domains\General\Models\BaseModel;

class UserCourse extends BaseModel
{
    protected $fillable = [
        'user_id',
        'course_id',
        'is_active',
        'progress',
        'started_at',
        'finished_at',
        'batch_id',
    ];

    protected $dates = [
        'started_at',
        'finished_at'
    ];

    /**
     * Get the user that owns the user course.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course that owns the user course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the level that owns the user course.
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Get the payments for the user course.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the student batch
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    

    /**
     * Get Total Payments Balance
     */
    public function totalPaymentsBalance()
    {
        return $this->payments->sum('amount');
    }

    /**
     * Get Payment Status
     */
    public function paymentStatus()
    {
        if($this->totalPaymentsBalance() == 0) {
            return 'Pending Purchase';
        }
        
        if($this->totalPaymentsBalance() > 0
         && $this->totalPaymentsBalance() < $this->course->cost) {
            return 'Partial';
        } 
        
        if($this->totalPaymentsBalance() == $this->course->cost) {
            return 'Paid';
        }

        return 'Pending Purchase';
    }

    /**
     * User Can make a payment
     */
    public function canMakePayment()
    {
        return match($this->paymentStatus()) {
            'Pending Purchase' => true,
            'Partial' => true,
            'Paid' => false
        };
    }

    /**
     * Get the status for the user course.
     */
    public function status()
    {
        if (! $this->is_active) {
            return 'Inactive';
        }
        
        if($this->payments->count() == 0) {
            return 'Pending Purchase';
        }

        if( $this->finished_at) {
            return 'Completed';
        }

        if(!$this->started_at ) {
            return 'Not Started';
        }

        return 'In Progress';
    }

    /**
     * Get the total amount due.
     */
    public function amountDue(): Int
    {
        return $this->course?->cost - $this->totalPaymentsBalance();
    }

    /** 
     * Get User Course Topics
     */
    public function userCompletedCourseTopics()
    {
        return $this->hasMany(UserCourseTopic::class, 'user_course_id', 'id');
    }

    public function activeTopic()
    {
        return $this->userCompletedCourseTopics()
            ->orderBy('created_at', 'DESC')
            ->first()->topic 
        ?? $this->course->levels()->first()->topics()->first();
    }

    public function progress()
    {
        return round(($this->userCompletedCourseTopics->count() /$this->course->topics->count()) * 100, 1);
    }
    
}