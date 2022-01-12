<x-layouts.app>
    <x-slot name="title">
        Payments
    </x-slot>
    <x-card>
        <x-slot name="header">
            Online Payments
        </x-slot>
        <x-slot name="body">
            <livewire:payments-table method="Online" />
        </x-slot>
    </x-card>

    <x-card>
        <x-slot name="header">
            Bank Transfer Payments
        </x-slot>
        <x-slot name="body">
            <livewire:payments-table method="Bank Transfer" />
        </x-slot>
    </x-card>
</x-layouts.app>