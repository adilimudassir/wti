<x-layouts.app>
    <x-slot name="title">
        {{ $course->title }}
    </x-slot>
    <livewire:courses.topics :course="$course" />
    <div class="separator my-10"></div>
    <div class="accordion" id="kt_accordion_1">
        <div class="accordion-item">
            <h2 class="accordion-header" id="levels_header">
                <button class="accordion-button fs-4 fw-bold bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#levels_body" aria-expanded="true" aria-controls="levels_body">
                    Manage Levels
                </button>
            </h2>
            <div id="levels_body" class="accordion-collapse collapse" aria-labelledby="levels_header" data-bs-parent="#kt_accordion_1">
                <div class="accordion-body">
                    <livewire:courses.levels :course="$course" />
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>