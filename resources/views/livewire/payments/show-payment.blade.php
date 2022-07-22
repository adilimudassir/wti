<div>
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
        <span>Amount Due</span>
        <small class="text-muted">{{ currency($payment->usrCourse?->amountDue()) }}</small>
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
</div>