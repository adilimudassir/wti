<div>
    @include('sweetalert::alert')
    <x-card>
        <x-slot name="header">
            Payments
        </x-slot>
        <x-slot name="toolbar">
            <div class="d-flow gap-5">
                @if(auth()->user()->can('create-payments') && $userCourse->paymentStatus() !== 'Paid')
                <button class="btn btn-outline btn-outline-dashed btn-danger btn-active-light-danger btn-sm " wire:click.prevent="createForm">
                    Create
                </button>
                @endif
            </div>
        </x-slot>
        <x-slot name="body">
            <fieldset class="d-grid gap-5 border p-5">
                @if($create || $edit)
                    <legend>Form</legend>
                    <x-form.select name="payment.type" wire:model="payment.type" label="Payment Type" :options="$paymentTypes" />

                    <x-form.select name="payment.method" wire:model="payment.method" label="Payment Method" :options="$paymentMethods" />

                    <x-form.readonly name="payment.amount" :value="currency($payment->amount)" label="Amount" />

                    @if($payment?->method == 'Bank Transfer' && !$edit)
                    <x-form.file name="payment.receipt" wire:model="receipt" label="Receipt" />

                    <div wire:loading wire:target="receipt">
                        <div class="clearfix">
                            <div class="spinner-border float-end" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="d-flex justify-content-stat my-2">
                        @if($create)
                        <button class="btn btn-primary btn-sm m-1" wire:click.prevent="save">Save</button>
                        @endif
                        @if($edit)
                        <button class="btn btn-primary btn-sm m-1" wire:click.prevent="update">Update</button>
                        @endif
                        <button class="btn btn-light-primary btn-sm m-1" wire:click.prevent="closeForms">
                            Close
                        </button>
                    </div>
                @elseif($updateReceipt)
                <div class="rounded border p-10">
                    <legend>Upload Receipt</legend>
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
                    @forelse($payments as $payment)
                        <legend class="d-flex justify-content-between bg-light p-5">
                            <div>
                                <div>
                                    <span># <span class="text-primary">{{ $payment->id }}</span></span>
                                    <small class="mx-1 text-tertiary fw-bolder"> <em>Initiated {{ $payment->created_at->diffForHumans() }}</em> </small>
                                </div>
                            </div>
                            <div>
                                @can('edit-payments')
                                <button class="btn btn-primary btn-sm " wire:click.prevent="editForm({{ $payment->id }})">
                                    Update
                                </button>

                                <button class="btn btn-primary btn-sm " wire:click.prevent="toggleReceiptForm({{ $payment->id }})">
                                    Upload Receipt
                                </button>
                                @endcan

                                @if(!$payment->verified && auth()->user()->can('verify-payments'))
                                    @if(!$paymentToBeVerified)
                                    <button class="btn btn-primary btn-sm " wire:click.prevent="confirmVerify({{ $payment->id }})">
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
                                @endif
                            </div>
                        </legend>
                        <div class="d-flex justify-content-between">
                            Payment Status
                            <small class="mx-5 badge badge-light-danger"> {{ $payment->status() }} </small>
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
                        <div class="d-flex justify-content-between">
                            <span>Receipt</span>
                            <small class="text-muted">
                                <a href="{{ Storage::url($payment->receipt) }}" target="_blank">View Receipt</a>
                            </small>
                        </div>

                    @empty
                    <div class="text-center">
                        You have not paid for this course yet.
                        <br>
                        <button class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-sm " wire:click.prevent="createForm">
                            Proceed to Payment
                        </button>
                    </div>
                    @endforelse
            @endif
            </fieldset>
        </x-slot>
    </x-card>
</div>