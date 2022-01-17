<x-layouts.classroom aside="on">
    <x-slot name="title">
        Class Room
    </x-slot>
    Welcome, {{ auth()->user()->name }}

    <div class="row mt-5">
        @forelse($userCourses as $userCourse)
        @if (!$userCourse->course->topics->count())
        @continue
        @endif

        @php

        @endphp
        <a href="{{ route('classroom.show', [$userCourse?->course->slug, $userCourse->activeTopic()->level->title, $userCourse->activeTopic()]) }}" class="card bg-hover-secondary text-hover-inverse-secondary g-5">
            <div class="card-header">
                <div class="card-title">
                    {{ $userCourse->course->title }}
                </div>
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bolder me-auto px-12 py-3">{{ $userCourse->status() }}</span>
                </div>
            </div>
            <div class="card-body">
                @if($userCourse->paymentStatus() !== 'Pending Purchase')
                <div class="text-muted fs-4">
                    <strong>Started since</strong> <em>{{ $userCourse->started_at?->diffForHumans() ?? 'Not started yet' }}</em>
                </div>
                @if($userCourse->finished_at)
                <div class="separator my-5"></div>
                <div class="text-muted fs-4">
                    <strong>Finished On</strong> <em>{{ $userCourse->finished_at?->diffForHumans() }}</em>
                </div>
                @endif
                @endif
            </div>
            <div class="card-footer">
                <div class="h-4px  bg-light my-2" data-bs-toggle="tooltip" title="{{ $userCourse->progress() }}% Complete" data-bs-original-title="This course is {{ $userCourse->progress() }}% completed">
                    <div class="bg-primary rounded h-10px" role="progressbar" style="width: {{ $userCourse->progress() }}%" aria-valuenow="{{ $userCourse->progress() }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </a>
        @empty
        <div class="rounded bg-white border p-10">
            <div class="text-center">
                <h3 class="text-gray-900">No courses found</h3>
            </div>
        </div>
        @endforelse
    </div>
</x-layouts.classroom>