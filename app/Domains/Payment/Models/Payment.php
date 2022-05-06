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
        'type',
        'method',
        'date',
        'receipt',
        'amount',
        'reference',
        'transaction_id',
    ]; 

    /**
     * cast the attributes to the correct type.
     */
    protected $casts = [
        'verified' => 'boolean',
        'date' => 'datetime',
        'transaction_data' => 'object',
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
        'Bank Transfer' => 'Bank Transfer',
        // 'Online' => 'Online',
        // 'CryptoCurrency' => 'CryptoCurrency',
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user course that owns the payment.
     */
    public function userCourse()
    {
        return $this->belongsTo(UserCourse::class);
    }

    /**
     * Get Payment Status
     */
    public function status(): String
    {
        if ($this->verified) {
            return 'Verified';
        }

        return 'Pending';
    }

    /**
     * Get Total Amount due
     */
    public function amountDue()
    {
        return $this
            ->where('created_at', '<=', $this->created_at)
            ->where('user_course_id', $this->user_course_id)
            ->get()->reduce(fn ($carry, $item) => $carry - $item->amount, $this->userCourse->course->cost);
    }
}