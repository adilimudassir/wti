<?php
namespace Domains\Course\Models;

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
     * Get the payment for the user course.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Get the status for the user course.
     */
    public function status()
    {
        if (! $this->is_active) {
            return 'Inactive';
        }
        
        if(! $this->payment?->verified) {
            return 'Pending Purchase';
        }

        if( $this->finished_at) {
            return 'Completed';
        }

        if($this->payment?->verified && !$this->started_at) {
            return 'Not Started';
        }

        return 'In Progress';
    }
}