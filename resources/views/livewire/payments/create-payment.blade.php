<div>
    <x-card>
        <x-slot name="header">Form</x-slot>
        <x-slot name="body">
            @if($saved)
            <x-alert type="success">
                Payment Created!
                <a class="btn btn-sm btn-primary" href="{{ route('payments.show', $payment->id) }}">View Payment</a>

            </x-alert>
            @else
            <x-form.select name="payment.type" wire:model="payment.type" label="Payment Type" :options="$paymentTypes" />

            <x-form.select name="payment.method" wire:model="payment.method" label="Payment Method" :options="$paymentMethods" />

            <x-form.readonly name="payment.amount" :value="currency($payment->amount)" label="Amount" />

            @if($payment?->method == 'Bank Transfer')
            <x-form.file name="receipt" wire:model="receipt" label="Receipt" />

            <div wire:loading wire:target="receipt">
                <div class="clearfix">
                    <div class="spinner-border float-end" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            @endif
            <div class="d-flex justify-content-stat my-2">
                <button class="btn btn-primary btn-sm m-1" wire:click.prevent="save">Save</button>
                <button class="btn btn-light-primary btn-sm m-1" wire:click.prevent="cancel">
                    Cancel
                </button>
            </div>
            @endif
        </x-slot>
    </x-card>
</div>