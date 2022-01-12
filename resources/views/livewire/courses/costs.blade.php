<div>
    <x-card>
        <x-slot name="header">
            Cost Management
        </x-slot>
        <x-slot name="toolbar">
            @if(! $showForm)
            <button class="btn btn-primary btn-sm ml" wire:click.prevent="toggleForm">
                Edit
            </button>
            @endif
        </x-slot>
        <x-slot name="body">
            @include('sweetalert::alert')
            @if($showForm)
            <div class="">
                <x-card class="d-grid gap-2 border m-2 p-2">
                    <x-slot name="body">
                        <x-form.number name="cost" wire:model="course.cost" label="Cost" />
                        <x-form.radio-buttons name="allow_partial_payment" wire:model="course.allow_partial_payments" label="Allow Partial Payments" :options="['true' => 1, 'false' => 0]" />
                        @if($course->allow_partial_payments)
                        <x-form.number name="partial_payment_allowed" wire:model="course.partial_payments_allowed" label="Number of Partial Payments Allowed" />
                        @else
                        <x-form.readonly name="Number of Partial Payments Allowed" :value="$course->partial_payments_allowed" label="Number of Partial Payments Allowed" />
                        @endif
                    </x-slot>
                    <x-slot name="footer">
                        <button class="btn btn-primary btn-sm" wire:click.prevent="save">Save</button>
                        <button class="btn btn-light btn-sm btn-outline" wire:click.prevent="toggleForm">
                            @if($showForm)
                            Cancel
                            @endif
                        </button>
                    </x-slot>
                </x-card>
            </div>
            @else
            <div class="d-grid gap-5">
                <fieldset class="border p-5">
                    <legend class="text-muted">Cost</legend>
                    {{ currency($course->cost) }}
                </fieldset>
                <fieldset class="border p-5">
                    <legend class="text-muted">Allow Partial Payments</legend>
                    <span class="badge badge-primary">
                        {{ $course->allow_partial_payments ? 'Yes' : 'No' }}
                    </span>
                </fieldset>
                <fieldset class="border p-5">
                    <legend class="text-muted">Number of Partial Payments Allowed</legend>
                    {{ $course->allow_partial_payments ? $course->partial_payments_allowed : 'N/A' }}
                </fieldset>
            </div>
            @endif
        </x-slot>
    </x-card>
</div>