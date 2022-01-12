<div>
    <x-card>
        <x-slot name="header">
            Level Management
        </x-slot>
        <x-slot name="body">
            @include('sweetalert::alert')
            <x-slot name="toolbar">
                <div class="d-flex justify-content-end">
                    @if(!$showForm)
                    <button class="btn {{ $showForm ? 'btn-light-primary' : 'btn-primary' }} mb-2 btn-sm" wire:click.prevent="toggleForm">
                        New
                    </button>
                    @endif
                </div>
            </x-slot>
            @if($showForm)
            <x-card>
                <x-slot name="body">
                    <x-form.text name="name" wire:model="level.name" label="Name" />
                    <x-form.text name="title" wire:model="level.title" label="Title" />
                    <x-form.textarea name="description" wire:model="level.description" label="Description" />
                </x-slot>
                <x-slot name="footer">
                    <div class="d-flex justify-content-stat my-2">
                        <button class="btn btn-primary btn-sm m-1" wire:click.prevent="save">Save</button>
                        <button class="btn btn-light-primary btn-sm m-1" wire:click.prevent="toggleForm">
                            Close
                        </button>
                    </div>
                </x-slot>
            </x-card>
            @else
            <div class="table-responsive">
                <table class="table border gy-7 gs-7 table-rounded">
                    <thead>
                        <tr class="border-0">
                            <th class="p-0 min-w-auto"></th>
                            <th class="p-0 min-w-auto"></th>
                            <th class="p-0 min-w-auto"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course->levels as $levelModel)
                        <tr class="@if($confirming === $levelModel->id) bg-primary fs-1 text-white @else fw-bold fs-6 text-gray-800 border-bottom border-gray-200 @endif">
                            <td class="fw-bold">
                                {{ $levelModel->name }}
                                <small class="text-muted d-block">{{ $levelModel->title}}</small>
                            </td>
                            <td class="fw-bold">{{ $levelModel->description }}</td>
                            <td class="d-grid gap-2 justify-content-end">
                                @if($confirming !== $levelModel->id)
                                <button type="button" wire:click="confirmDelete({{ $levelModel->id }})" class="btn btn-icon btn-light-primary me-5 ">
                                    <i class="bi bi-x fs-2"></i>
                                </button>
                                @else
                                <button type="button" wire:click="delete({{ $levelModel->id }})" class="btn btn-sm btn-primary">
                                    Delete?
                                </button>
                                <button type="button" wire:click="cancelDelete()" class="btn btn-light btn-sm">
                                    Cancel
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </x-slot>
    </x-card>
</div>