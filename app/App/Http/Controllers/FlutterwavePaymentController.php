<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domains\Payment\Models\Payment;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwavePaymentController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize(Request $request)
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer,ussd',
            'amount' => $request->amount,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('payments.flutterwave.callback'),
            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => $request->course_title,
                "description" => $request->course_title
            ]
        ];

        dd($data);

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {
        $payment = Payment::where('reference', request()->tx_ref)->first();
        
        if(request()->status == 'successful') {
            
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            
            $response = Flutterwave::verifyTransaction($transactionID);
            
            $payment->transaction_id = $transactionID;
            $payment->transaction_data = $response['data'];
            $payment->verified = true;
            $payment->status = request()->status;
            $payment->save();

            alert()->success('Transaction successful');

            return redirect()->route('payments.show', $payment->id);
        }
        
        if (request()->status ==  'cancelled') {
            //Put desired action/code after transaction has been cancelled here
            alert()->error('Transaction cancelled');
            
            $payment->delete();
            
            return redirect()->route('payments.create', ['user_course_id' => $payment->user_course_id]);
        }

        alert()->error('Transaction Failed');

        $payment->delete();

        return redirect()->route('payments.create', ['user_course_id' => $payment->user_course_id]);
    }
}

