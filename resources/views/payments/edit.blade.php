<x-layouts.app>
    <x-slot name="title">
        Edit Payment
    </x-slot>
    <x-card>
        <x-slot name="header">Form</x-slot>
        <x-slot name="body">
            @if($errors->any())
            <x-alert type="danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-alert>
            @endif
            <div id="form">
                <p class="text-left fs-3">
                    Fill below to update to payment amount
                    <i class="fa fa-angle-down fa-xl mt-2 text-primary"></i>
                </p>
                <x-form method="PATCH" :route="route('payments.update', $payment->id)" :back-route="route('payments.show', $payment->id)" files>
                    <h3 class="my-5 p-2 border">
                        <label for="staticEmail" class="form-label fs-6 fw-bolder text-dark mt-5">Amount to Pay</label>

                        <input type="text" name="amount" class="form-control-lg form-control" value="{{ $payment->amount }}">
                    </h3>
                    <x-form.file name="receipt" label="Receipt (Leave blank if you don't want to replace existing receipt)" />
                </x-form>
            </div>
        </x-slot>
    </x-card>
</x-layouts.app>