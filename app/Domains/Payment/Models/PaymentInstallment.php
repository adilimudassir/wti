<?php
namespace Domains\Payment\Models;

use Domains\General\Models\BaseModel;

class PaymentInstallment extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'payment_id',
        'amount',
        'date',
        'verified',
        'method',
    ];

    /**
     * cast the attributes to the correct type.
     */
    protected $casts = [
        'verified' => 'boolean',
        'date' => 'datetime',
    ];

    /**
     * Payment relationship
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}