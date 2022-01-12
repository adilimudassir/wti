<div>
    @include('sweetalert::alert')

    <x-card>
        <x-slot name="header">
            <span class="pl-2">Status</span>
            <small class="mx-5 badge badge-light-danger">{{ $payment->status() }} </small>
        </x-slot>
        <x-slot name="toolbar">
            <!--begin::Trigger-->
            <button type="button" class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                Actions
                <i class="bi bi-chevron-down"></i>
            </button>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3 d-grid">
                    <button class="btn btn-white menu-link px-3" wire:click.prevent="toggleForm">
                        Edit Payment
                    </button>
                </div>
                <div class="menu-item px-3 d-grid">
                    <button class="btn btn-white menu-link px-3" wire:click.prevent="toggleForm">
                        Update Receipt
                    </button>
                </div>
                <div class="menu-item px-3 d-grid">
                    <button class="btn btn-white menu-link px-3" wire:click.prevent="toggleForm">
                        Verify Payment
                    </button>
                </div>
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
                @if($payment?->method == 'Bank Transfer')
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