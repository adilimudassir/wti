<x-layouts.app>
    <x-slot name="title">
        View Payment
    </x-slot>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <x-button.link :href="route('payments.index')" class="btn btn-sm btn-light-primary" text="Back" icon="bi bi-chevron-left" />
        </div>
    </div>
    <livewire:user.payment :payment="$payment" />
</x-layouts.app>