<x-layouts.app>
    <x-slot name="title">
        View Payment
    </x-slot>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <x-button.link :href="route('payments.index')" class="btn btn-sm btn-light-primary" text="Back" icon="bi bi-chevron-left" />
        </div>
    </div>
    <x-card>
        <x-slot name="header">
            <div>
                <span># <span class="text-primary">{{ $payment->id }}</span></span>
                <small class="mx-1 text-tertiary fw-bolder"> <em>Initiated {{ $payment->created_at->diffForHumans() }}</em> </small>
            </div>
        </x-slot>
        <x-slot name="toolbar">
            <div>
                @can('edit-payments')
                @if(!$payment->verified)
                <a class="btn btn-primary btn-sm " href="{{ route('payments.edit', $payment->id) }}">
                    Edit
                </a>
                <x-button.link :href="route('payments.verify', $payment->id)" 
                 text="Verify" />
                @endif
                @endcan
            </div>
        </x-slot>
        <x-slot name="body">
            <div class="fs-4">
                <div class="d-flex justify-content-between">
                    Payment Status
                    <small class="badge badge-light-danger"> {{ $payment->status() }} </small>
                </div>
                <div class="d-flex justify-content-between">
                    Payment Type
                    <small class="text-muted">{{ $payment->type }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    Payment Method
                    <small class="text-muted">{{ $payment->method }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Amount</span>
                    <small class="text-muted">{{ currency($payment->amount) }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    Date
                    <small class="text-muted">{{ $payment->created_at->format('d M Y') }}</small>
                </div>
                @if($payment->method === "Online")
                <div class="d-flex justify-content-between">
                    <span>Transaction ID</span>
                    <small class="text-muted">{{ $payment->transaction_id }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Transaction Type</span>
                    <small class="text-muted">{{ $payment->transaction_data->narration }}</small>
                </div>
                <hr>
                @if($payment->transaction_data->payment_type === 'card')
                <div class="d-flex justify-content-between">
                    <span>Card Type</span>
                    <small class="text-muted">{{ $payment->transaction_data->card->type }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Card Number</span>
                    <small class="text-muted">{{ $payment->transaction_data->card->first_6digits }}*******{{ $payment->transaction_data->card->last_4digits }}</small>
                </div>
                @endif
                <div class="d-flex justify-content-between">
                    <span>Charged Amount</span>
                    <small class="text-muted">{{ currency($payment->transaction_data->amount) }}</small>
                </div>

                @endif
            </div>
        </x-slot>
    </x-card>
</x-layouts.app>