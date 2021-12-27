<?php
namespace Domains\Payment\Models;

use Domains\Auth\Models\User;
use Domains\Course\Models\Course;
use Domains\Course\Models\UserCourse;
use Domains\General\Models\BaseModel;
use Domains\Payment\Models\PaymentInstallment;

class Payment extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'user_course_id',
        'verified',
        'completed',
        'type',
        'method',
        'date',
        'receipt',
        'amount',
    ]; 

    /**
     * cast the attributes to the correct type.
     */
    protected $casts = [
        'verified' => 'boolean',
        'completed' => 'boolean',
        'date' => 'datetime',
    ];

    /**
     * Payment types
     */
    public static $types = [
        'Complete' => 'Complete',
        'Partial' => 'Partial',
    ];

    /**
     * Payment methods
     */
    public static $methods = [
        'Deposit' => 'Deposit',
        'Online' => 'Online',
    ];

    /**
     * Get the total amount paid.
     */
    public function amountPaid()
    {
        return $this->amount + $this->installments()?->sum('amount');
    }

    /**
     * Get the total amount due.
     */
    public function amountDue()
    {
        return $this->userCourse?->course?->cost - $this->amountPaid();
    }

    /**
     * Get Payment Status
     */
    public function status()
    {
        if ($this->verified && $this->completed) {
            return 'Complete';
        } elseif ($this->verified && !$this->completed) {
            return 'Partial';
        } else {
            return 'Pending';
        }
    }

/**
     * User relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * UserCourse relationship
     */
    public function userCourse()
    {
        return $this->belongsTo(UserCourse::class);
    }

    /**
     * Payment Installments relationship
     */
    public function installments()
    {
        return $this->hasMany(PaymentInstallment::class);
    }

}