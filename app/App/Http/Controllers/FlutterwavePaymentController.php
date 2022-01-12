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
        $transactionID = Flutterwave::getTransactionIDFromCallback();

        $payment = Payment::where('reference', request()->data['tx_ref'])->first();
        $payment->transaction_id = $transactionID;
        $payment->status = request()->status;
        $payment->transaction_data = json_encode(request()->data);
        $payment->save();

        
        if(request()->status == 'successful') {
            $data = Flutterwave::verifyTransaction($transactionID);
        }
        
        if (request()->status ==  'cancelled') {
            //Put desired action/code after transaction has been cancelled here
        } else {
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}

