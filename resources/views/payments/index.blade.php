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
            Deposit Payments
        </x-slot>
        <x-slot name="body">
            <livewire:payments-table method="Deposit" />
        </x-slot>
    </x-card>
</x-layouts.app>