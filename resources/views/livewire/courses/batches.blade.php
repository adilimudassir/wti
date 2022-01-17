<div>
    <x-card>
        <x-slot name="header">
            Batch Management
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
                    <x-form.text name="batch.name" wire:model="batch.name" label="Name" />
                    <x-form.date name="start_date" wire:model="start_date" label="Start Date" />
                    <x-form.date name="end_date" wire:model="end_date" label="End Date" />
                    <x-form.radio-buttons name="batch.active" wire:model="batch.active" label="Active" :options="['true' => 1, 'false' => 0]" />
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
                            <th class="p-0 min-w-auto"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course->batches()->orderBy('id', 'DESC')->get() as $batchModel)
                        <tr class="@if($confirming === $batchModel->id) bg-primary fs-1 text-white @else fw-bold fs-6 text-gray-800 border-bottom border-gray-200 @endif">
                            <td class="fw-bold">
                                {{ $batchModel->name }} <span class="badge badge-{{ $batchModel->active ? 'success' : 'info' }}">
                                    {{ $batchModel->active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="fw-bold">Begins
                                <span class="text-muted">
                                    {{ $batchModel->start_date->toDayDateTimeString() }} ({{ $batchModel->start_date->diffForHumans() }})
                                </span>
                            </td>
                            <td class="fw-bold">Ends
                                <span class="text-muted">
                                    {{ $batchModel->end_date->toDayDateTimeString() }} ({{ $batchModel->end_date->diffForHumans()}})
                                </span>
                            </td>

                            <td class="d-grid gap-2 justify-content-end">
                                @if(!$batchModel->active && $batchModel->userCourses->count() === 0)
                                @if($confirming !== $batchModel->id)
                                <button type="button" wire:click="confirmDelete({{ $batchModel->id }})" class="btn btn-icon btn-light-primary me-5 ">
                                    <i class="bi bi-x fs-2"></i>
                                </button>
                                @else
                                <button type="button" wire:click="delete({{ $batchModel->id }})" class="btn btn-sm btn-primary">
                                    Delete?
                                </button>
                                <button type="button" wire:click="cancelDelete()" class="btn btn-light btn-sm">
                                    Cancel
                                </button>
                                @endif
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