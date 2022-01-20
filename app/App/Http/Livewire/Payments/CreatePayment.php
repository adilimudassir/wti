<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use Livewire\WithFileUploads;
use Domains\Payment\Models\Payment;
use Domains\Course\Models\UserCourse;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class CreatePayment extends Component
{
    use WithFileUploads;

    public ?Payment $payment = null;

    public UserCourse $userCourse;
    
    public $receipt = null, $saved = false;

    protected $rules = [
        'payment.type' => 'required',
        'payment.amount' => 'required',
        'payment.method' => 'required',
        // 'receipt' => "required",
    ];

    public function mount()
    {
        $this->payment = new Payment();
    }

    public function updatedPaymentType()
    {
        $this->payment->amount = $this->userCourse->course->getPayableCost($this->payment->type);
    }

    public function save()
    {
        $this->validate();

        if ($this->payment->method == 'Bank Transfer') {
            if($this->receipt) {
                $this->payment->receipt = $this->receipt->store('payments');
            }
            $this->payment->user_course_id = $this->userCourse->id;
            $this->payment->user_id = auth()->user()->id;
            $this->payment->date = now();
            $this->payment->save();
        }

        if($this->payment->method == 'Online') {
            //This generates a payment reference
            $reference = Flutterwave::generateReference();

            $this->payment->reference = $reference;

            // Enter the details of the payment
            $data = [
                'payment_options' => 'card,banktransfer',
                'amount' => $this->payment->amount,
                'email' => $this->userCourse->user->email,
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('payments.flutterwave.callback'),
                'customer' => [
                    'email' => $this->userCourse->user->email,
                    "phone_number" => $this->userCourse->user->phone,
                    "name" => $this->userCourse->user->name
                ],

                "customizations" => [
                    "title" => "{$this->userCourse->course->title} Payment",
                    "description" => $this->payment->type
                ]
            ];

            $payment = Flutterwave::initializePayment($data);
            
            if ($payment['status'] !== 'success') {
                alert()->error('Failed')->toToast();
            }

            $this->payment->user_course_id = $this->userCourse->id;
            $this->payment->user_id = auth()->user()->id;
            $this->payment->date = now();
            $this->payment->save();

            return redirect($payment['data']['link']);
        }
        
        alert()->success('Payment Created!')->toToast();
        $this->saved = true;
    }

    public function cancel()
    {
        return redirect()->route('user-courses.show', $this->userCourse->course->slug);
    }

    public function render()
    {
        $paymentTypes = Payment::$types;

        if (!$this->userCourse?->course?->allow_partial_payments) {
            unset($paymentTypes['Partial']);
        }

        if ($this->userCourse?->paymentStatus() === 'Partial') {
            unset($paymentTypes['Complete']);
        }
        
        return view('livewire.payments.create-payment', [
            'paymentMethods' => Payment::$methods,
            'paymentTypes' => $paymentTypes,
        ]);
    }
}
