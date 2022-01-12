<div>
    <x-card>
        <x-slot name="header">
            Payments
        </x-slot>
        <x-slot name="body">
            @forelse($userCourse->payments as $key => $payment)
                <livewire:payments.show-payment :payment="$payment" />
            @empty
            <div class="text-center">
                You have not paid for this course yet.
                <br>
                <button class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-sm " wire:click.prevent="createForm">
                    Proceed to Payment
                </button>
            </div>
            @endforelse
        </x-slot>
    </x-card>
</div>