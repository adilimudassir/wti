<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domains\Course\Models\UserCourse;
use Domains\Payment\Repositories\PaymentRepository;

class PaymentController extends Controller
{
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

        $userCourse = UserCourse::find($request->user_course_id);

        return view('payments.create', [
            'userCourse' => $userCourse,
        ]);
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

    public function verify($id)
    {
        $this->authorize('update-payments');

        $payment = $this->paymentRepository->getById($id);
        
        $payment->verified = true;
        $payment->save();

        alert()->success('Payment Verified!')->toToast();

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
