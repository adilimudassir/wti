<div>
    @include('partials.messages')
    <div class="d-flex flex-wrap flex-stack my-5">
        <h3 class="fw-bolder"></h3>
        <div class="d-flex flex-wrap">
            <button class="btn {{ $showForm ? 'btn-light-primary' : 'btn-primary' }} mb-3" wire:click.prevent="toggleForm">
                @if($showForm)
                Close Form
                @else
                New Level
                @endif
            </button>
        </div>
    </div>
    @if($showForm)
    <x-card>
        <x-slot name="header">
            New Level
        </x-slot>
        <x-slot name="body">
            <x-form.text name="name" wire:model="level.name" label="Name" />
            <x-form.text name="title" wire:model="level.title" label="Title" />
            <x-form.textarea name="description" wire:model="level.description" label="Description" />
            <button class="btn btn-primary d-flex justify-content-end my-1" wire:click.prevent="save">Save</button>
        </x-slot>
    </x-card>
    @else
    <div class="card card-xl-stretch fs-4 mb-5 mb-xl-10">
        <div class="card-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="border-0">
                            <th class="p-0 min-w-auto"></th>
                            <th class="p-0 min-w-auto"></th>
                            <th class="p-0 min-w-auto"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course->levels as $levelModel)
                        <tr>
                            <td>
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $levelModel->name }}</a>
                                <span class="text-muted fw-bold d-block">{{ $levelModel->title}}</span>
                            </td>
                            <td class=" text-muted fw-bold">{{ $levelModel->description }}</td>
                            <td>
                                <button type="button" wire:click="delete({{ $levelModel->id }})" class="btn btn-icon btn-light-primary me-5 ">
                                    <i class="bi bi-x fs-2"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>