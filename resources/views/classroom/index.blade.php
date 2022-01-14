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
                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">{{ $userCourse->status() }}</span>
                </div>
            </div>
            <div class="card-body gap-5">
                @if($userCourse->paymentStatus() !== 'Pending Purchase')
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 my-2">
                    <div class="text-muted"><em>Started</em></div>
                    <div class="fs-6 text-gray-800">
                        {{ $userCourse->started_at?->diffForHumans() ?? 'Not started yet' }}
                    </div>
                </div>
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 my-2">
                    <div class="text-muted"><em>Finished</em></div>
                    <div class="fs-6 text-gray-800">
                        {{ $userCourse->finished_at?->diffForHumans() ?? '.....' }}
                    </div>
                </div>
                @endif
                <div class="h-4px w-100 bg-light my-2" data-bs-toggle="tooltip" title="{{ $userCourse->progress() }}% Complete" data-bs-original-title="This course is {{ $userCourse->progress() }}% completed">
                    <div class="bg-primary rounded h-10px" role="progressbar" style="width: {{ $userCourse->progress() }}%" aria-valuenow="{{ $userCourse->progress() }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </a>
        @empty
        <div class="rounded bg-white border p-10">
            <div class="text-center">
                <h3 class="text-gray-900">No courses found</h3>
            </d {{ $userCourse->progress() }}
        @endforelse
    </div>
</x-layouts.classroom>