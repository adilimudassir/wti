<div>
    @include('sweetalert::alert')
    <x-card>
        <x-slot name="header">
            <p>
                Course Status
                <small class="mx-2 badge badge-light-danger">{{ $userCourse->status() }} </small>
            </p>
        </x-slot>
        <x-slot name="body">
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Title</legend>
                {!! $userCourse->course->title !!}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Description</legend>
                {!! $userCourse->course->description !!}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Started</legend>
                {!! $userCourse->started_at?->diffForHumans() ?? 'Not Yet' !!}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Finished</legend>
                {!! $userCourse->finished_at?->diffForHumans() ?? 'Not Yet' !!}
            </fieldset>
        </x-slot>
    </x-card>
    <x-card>
        <x-slot name="header">
            <p>
                Payment Status
                <small class="mx-5 badge badge-light-danger">{{ $userCourse->payment?->status() ?? '....' }} </small>
            </p>
        </x-slot>
        <x-slot name="body">
            @if($showForm)
            <div class="">
                <x-form.select name="type" wire:model="payment.type" label="Payment Type" :options="$paymentTypes" />

                <x-form.select name="method" wire:model="payment.method" label="Payment Method" :options="$paymentMethods" />

                @if($payment?->type == 'Complete')
                <x-form.readonly name="Amount" :value="currency($userCourse->course->cost)" label="Amount" />
                @else
                <x-form.text name="Amount" wire:model="payment.amount" label="Amount" />

                @endif

                @if($payment?->method == 'Deposit')
                <x-form.file name="receipt" wire:model="receipt" label="Receipt" />
                @error('payment.file') <span class="error">{{ $message }}</span> @enderror

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
                    <button class="btn btn-light-primary btn-sm m-1" wire:click.prevent="toggleForm">
                        Close
                    </button>
                </div>
            </div>
            @endif
            @if($userCourse->payment)
            <div class="fs-3 d-grid gap-5 border border-transparent">
                <div class="d-flex justify-content-between">
                    Payment Type
                    <small class="text-muted">{{ $userCourse->payment?->type }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    Payment Method
                    <small class="text-muted">{{ $userCourse->payment?->method }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Amount</span>
                    <small class="text-muted">{{ currency($userCourse->payment?->amount) }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    Date
                    <small class="text-muted">{{ $userCourse->payment?->created_at->format('d M Y') }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Receipt</span>
                    <small class="text-muted">
                        <a href="{{ Storage::url($userCourse->payment?->receipt) }}" target="_blank">View Receipt</a>
                    </small>
                </div>
            </div>
            @else
            @if(!$showForm)
            <div class="text-center">
                You have not paid for this course yet.
                <br>
                <button class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-sm " wire:click.prevent="toggleForm">
                    Proceed to Payment
                </button>
            </div>
            @endif
            @endif
        </x-slot>
    </x-card>
</div>