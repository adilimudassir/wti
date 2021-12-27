<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function show($id)
    {
        $this->authorize('read-payments');

        return view('payments.show', [
            'payment' => $this->paymentRepository->getById($id),
        ]);
    }

    public function edit($id, )
    {
        $this->authorize('update-payments');

        return view('payments.edit', [
            'payment' => $this->paymentRepository->getById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update-payments');

        return redirect()
            ->route('payments.index')
            ->withFlashSuccess('Role Updated Successfully!');
    }

    public function destroy($id)
    {
        $this->authorize('delete-payments');

        $this->paymentRepository->deleteById($id);

        return redirect()
            ->route('payments.index')
            ->withFlashSuccess('Role Deleted Successfully!');
    }
}
