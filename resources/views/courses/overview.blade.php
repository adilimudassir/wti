<x-layouts.app>
    <x-slot name="title">
        {{ $course->title }}
    </x-slot>
    <div class="d-flex justify-content-between mb-3">
        <div>

        </div>
    </div>
    <x-card>
        <x-slot name="header">
            <div>
                Course Details
            </div>
        </x-slot>
        <x-slot name="toolbar">
            @can('edit-courses')
            <x-button.link :href="route('courses.edit', $course->slug)" class="btn btn-sm btn-light-primary" text="Edit" icon="bi bi-pencil" />
            @endcan
        </x-slot>
        <x-slot name="body">
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Description</legend>
                {!! $course->description !!}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Duration</legend>
                {!! $course->duration !!}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Outline</legend>
                <div class="accordion" id="course-list">
                    @foreach($course->levels as $level)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#level_{{ $level->id }}" aria-expanded="false" aria-controls="level_{{ $level->id }}">
                                {{ $level->name }} Level ({{ $level->title }})
                            </button>
                        </h2>
                        <div id="level_{{ $level->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#course-list">
                            <div class="accordion-body">
                                <ul>
                                    @foreach($level->topics as $topic)
                                    <li class="d-flex align-items-center py-2">
                                        <span class="bullet bullet-vertical bg-danger me-5"></span> <span class="text-gray-800">
                                            {{ $topic->title }}
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </fieldset>
        </x-slot>
    </x-card>
    <x-card>
        <x-slot name="header">
            Registered Students
        </x-slot>
        <x-slot name="body">
            <livewire:course-students-table :course="$course" />
        </x-slot>
    </x-card>
    <div class="separator my-5"></div>

    <livewire:courses.topics :course="$course" />
    <div class="separator my-5"></div>
    <livewire:courses.levels :course="$course" />
    <div class="separator my-5"></div>
    <livewire:courses.batches :course="$course" />
    <div class="separator my-5"></div>
    <livewire:courses.costs :course="$course" />
</x-layouts.app>