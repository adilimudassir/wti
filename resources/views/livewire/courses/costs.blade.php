<div>
    <x-card>
        <x-slot name="header">
            Cost Management
        </x-slot>
        <x-slot name="body">
            @include('sweetalert::alert')
            @if($showForm)
            <div class="d-flex">
                <div class="flex-fill">
                    <input class="form-control form-control-sm" type="number" wire:model="course.cost" />
                </div>
                <div class="flex-fill mx-2">
                    <button class="btn btn-primary btn-sm" wire:click.prevent="save">Save</button>
                    <button class="btn btn-light btn-sm btn-outline" wire:click.prevent="toggleForm">
                        @if($showForm)
                        Cancel
                        @endif
                    </button>
                </div>
            </div>
            @else
            <div class="d-flex justify-content-between fs-3">
                <div>
                    <strong class="text-gray-900 pr-5">COST:</strong> {{ currency($course->cost) }}
                </div>
                @if(!$showForm)
                <button class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-sm ml" wire:click.prevent="toggleForm">
                    Edit
                </button>
            </div>
            @endif
            @endif
        </x-slot>
    </x-card>
</div>