<x-layouts.app>
    <x-slot name="title">
        View Batch Details
    </x-slot>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <x-button.link :href="route('courses.overview', $batch->course)" class="btn btn-sm btn-light-primary" text="Back" icon="bi bi-chevron-left" />
        </div>
        <div>
            @can('edit-batches')
            <x-button.link :href="route('batches.send-admission-letter', $batch->id)" class="btn btn-sm btn-light-primary" text="Send Admission Letter" icon="bi bi-send" />
            @endcan
        </div>
    </div>
    <x-card>
        <x-slot name="header">
            <div>
                Batch {{ $batch->name }}
            </div>
        </x-slot>
        <x-slot name="toolbar">
        </x-slot>
        <x-slot name="body">
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Starting Date</legend>
                {{ $batch->start_date->format('d M Y') }}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Ending Date</legend>
                {{ $batch->end_date->format('d M Y') }}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Course</legend>
                {{ $batch->course->title }}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Students <span class="badge badge-success">{{ $batch->userCourses->count() }}</span></legend>
                <div class="d-flex flex-column">
                    @foreach($batch->userCourses as $userCourse)
                    <li class="d-flex align-items-center py-2">
                        <span class="bullet bullet-vertical bg-danger me-5"></span> <span class="text-gray-800">{{ $userCourse->user->name }} - {{ $userCourse->matriculation_number ?? 'Not Admitted yet' }}</span>
                    </li>
                    @endforeach
                </div>
            </fieldset>
        </x-slot>
    </x-card>
    {{
        html()
            ->modelForm($batch, 'PATCH', route('batches.update', $batch->id))
            ->class('form-horizontal')
        ->open() 
    }}
    <x-card>
        <x-slot name="header">
            Update Batch
        </x-slot>
        <x-slot name="body">
            <x-form.text name="name" label="Name" />
            <x-form.date name="start_date" label="Start Date" />
            <x-form.date name="end_date" label="End Date" />
        </x-slot>
        <x-slot name="footer">
            <x-form.actions label="Update" :back-route="route('courses.overview', $batch->course)" />
        </x-slot>
    </x-card>
    {{ html()->closeModelForm() }}

</x-layouts.app>