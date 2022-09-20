<?php

namespace App\Http\Controllers;

use App\Mail\PaymentMade;
use Illuminate\Http\Request;
use App\Repositories\FileUpload;
use Domains\Payment\Models\Payment;
use Illuminate\Support\Facades\Mail;
use Domains\Course\Models\UserCourse;
use App\Notifications\PaymentVerified;
use App\Notifications\PaymentSubmitted;
use App\Http\Requests\PaymentFormRequest;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Domains\Payment\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    use FileUpload;
    /**
     * create an instance of the controller.
     *
     * @param PaymentRepository $paymentRepository
     */
    public function __construct(private PaymentRepository $paymentRepository)
    {
    }

    public function index()
    {
        $this->authorize('read-payments');

        return view('payments.index', [
            //
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('create-payments');
        $partialAmountToBePaid = 0;

        $userCourse = UserCourse::with('user')->find($request->user_course_id);
        $paymentTypes = Payment::$types;

        if ($userCourse?->course?->allow_partial_payments) {
            // unset($paymentTypes['Complete']);
            $partialAmountToBePaid = $userCourse->getPartialPayableCost();
        } else {
            unset($paymentTypes['Partial']);
        }

        if ($userCourse?->paymentStatus() === 'Partial') {
            unset($paymentTypes['Complete']);
        }

        if ($userCourse->account_type === 'REGULAR') {
            
        }

        return view('payments.create', [
            'userCourse' => $userCourse,
            'paymentMethods' => Payment::$methods,
            'paymentTypes' => $paymentTypes,
            'partialAmountToBePaid' => $partialAmountToBePaid,
        ]);
    }

    public function store(PaymentFormRequest $request)
    {
        $userCourse = UserCourse::find($request->user_course_id);

        if ($userCourse->amountDue() <= 0) {
            alert()->info('Payment Already completed!')->toToast();
            return redirect()->route('dashboard');
        }
        
        
        $paymentInstance = new Payment();

        if ($request->payment_method == 'Bank Transfer') {
            if ($request->receipt) {
                $paymentInstance->receipt = $this->storeFile($request->receipt, 'payments');
            }
        }

        if ($request->payment_method == 'Online') {
            //This generates a payment reference
            $reference = Flutterwave::generateReference();

            $paymentInstance->reference = $reference;

            // Enter the details of the payment
            $data = [
                'payment_options' => 'card,banktransfer',
                'amount' => $request->amount,
                'email' => $userCourse->user->email,
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('payments.flutterwave.callback'),
                'customer' => [
                    'email' => $userCourse->user->email,
                    "phone_number" => $userCourse->user->phone,
                    "name" => $userCourse->user->name
                ],

                "customizations" => [
                    "title" => "{$userCourse->course->title} Payment",
                    "description" => $request->payment_type
                ]
            ];

            $payment = Flutterwave::initializePayment($data);

            if ($payment['status'] !== 'success') {
                alert()->error('Failed')->toToast();
                return back();
            }
        }

        $paymentInstance->user_course_id = $userCourse->id;
        $paymentInstance->user_id = auth()->user()->id;
        $paymentInstance->date = now();
        $paymentInstance->type = $request->payment_type;
        $paymentInstance->amount = $request->amount;
        $paymentInstance->method = $request->payment_method;
        $paymentInstance->save();

        alert()->success('Payment Created!')->toToast();

        Mail::to('operations@wavecresttradinginstitute.com')
            ->send(new PaymentMade($userCourse, route('payments.show', $paymentInstance->id)));

        $userCourse->user->notify(new PaymentSubmitted($paymentInstance));
        
        if ($request->payment_method == 'Bank Transfer') {
            $redirect = route('dashboard');
        }

        if ($request->payment_method == 'Online') {
            $redirect = $payment['data']['link'];
        }
        return redirect($redirect);
    }

    public function show($id)
    {
        $this->authorize('read-payments');

        return view('payments.show', [
            'payment' => $this->paymentRepository->getById($id),
        ]);
    }

    public function edit($id)
    {
        $this->authorize('update-payments');

        return view('payments.edit', [
            'payment' => $this->paymentRepository->getById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update-payments');

        $payment = $this->paymentRepository->getById($id);

        if ($request->payment_method == 'Bank Transfer') {
            if ($request->receipt) {
                $payment->receipt = $this->storeFile($request->receipt, 'payments');
            }
        }
        $payment->amount = $request->amount;
        $payment->save();

        alert()->success('Payment Updated!')->toToast();

        return redirect()->route('payments.show', $payment->id);
    }

    public function verify($id)
    {
        $this->authorize('update-payments');

        $payment = $this->paymentRepository->getById($id);

        $payment->verified = true;
        $payment->save();

        alert()->success('Payment Verified!')->toToast();

        $payment->userCourse?->user?->notify(new PaymentVerified($payment));

        return back();
    }

    public function destroy($id)
    {
        $this->authorize('delete-payments');

        $this->paymentRepository->deleteById($id);

        return redirect()
            ->route('payments.index')
            ->withFlashSuccess('Payment Deleted Successfully!');
    }
}
