<div>
    @include('sweetalert::alert')

    <x-card>
        <x-slot name="header">
            <span class="pl-2">Status</span>
            <small class="mx-5 badge badge-light-danger">{{ $payment->status() }} </small>
        </x-slot>
        <x-slot name="toolbar">
            <div class="d-flow gap-5">
                <button class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-sm " wire:click.prevent="toggleForm">
                    Update
                </button>
                <button class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-sm " wire:click.prevent="toggleReceiptForm">
                    Upload Receipt
                </button>

                @if(!$verifying)
                <button class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-sm " wire:click.prevent="confirmVerify">
                    Verify
                </button>
                @else
                <button type="button" wire:click.prevent="verify" class="btn btn-sm btn-primary">
                    Confirm Verify?
                </button>
                <button type="button" wire:click.prevent="cancelVerify" class="btn btn-light btn-sm">
                    Cancel
                </button>
                @endif
            </div>
        </x-slot>
        <x-slot name="body">
            @if($showForm)
            <div class="rounded border p-10">
                <div class="">
                    <x-form.select name="type" wire:model="payment.type" label="Payment Type" :options="$paymentTypes" />

                    <x-form.select name="method" wire:model="payment.method" label="Payment Method" :options="$paymentMethods" />

                    @if($payment?->type == 'Complete')
                    <x-form.readonly name="Amount" :value="currency($payment->userCourse->course->cost)" label="Amount" />
                    @else
                    <x-form.text name="Amount" wire:model="payment.amount" label="Amount" />

                    @endif

                    <div class="d-flex justify-content-stat my-2">
                        <button class="btn btn-primary btn-sm m-1" wire:click.prevent="save">Save</button>
                        <button class="btn btn-light-primary btn-sm m-1" wire:click.prevent="toggleForm">
                            Close
                        </button>
                    </div>
                </div>
            </div>
            @elseif($updateReceipt)
            <div class="rounded border p-10">
                @if($payment?->method == 'Deposit')
                <x-form.file name="receipt" wire:model="receipt" label="Receipt" />
                @error('receipt') <span class="error">{{ $message }}</span> @enderror

                <div wire:loading wire:target="receipt">
                    <div class="clearfix">
                        <div class="spinner-border float-end" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="d-flex justify-content-stat my-2">
                    <button class="btn btn-primary btn-sm m-1" wire:click.prevent="saveReceipt">Save</button>
                    <button class="btn btn-light-primary btn-sm m-1" wire:click.prevent="toggleReceiptForm">
                        Close
                    </button>
                </div>
            </div>
            @else
            <div class="fs-20 d-grid gap-5 border border-transparent">
                <h3 class="d-flex justify-content-between">
                    Payment Type
                    <small class="text-muted">{{ $payment->type }}</small>
                </h3>
                <h3 class="d-flex justify-content-between">
                    Payment Method
                    <small class="text-muted">{{ $payment->method }}</small>
                </h3>
                <h3 class="d-flex justify-content-between">
                    <span>Amount</span>
                    <small class="text-muted">{{ currency($payment->amount) }}</small>
                </h3>
                <h3 class="d-flex justify-content-between">
                    Date
                    <small class="text-muted">{{ $payment->created_at->format('d M Y') }}</small>
                </h3>
                <h3 class="d-flex justify-content-between">
                    <span>Receipt</span>
                    <small class="text-muted">
                        <a href="{{ Storage::url($payment->receipt) }}" target="_blank">View Receipt</a>
                    </small>
                </h3>

            </div>
            @endif

        </x-slot>
    </x-card>
</div>