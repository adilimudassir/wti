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

        <a href="{{ route('classroom.show', [$userCourse?->course->slug, $userCourse?->course->levels()->first()->title, $userCourse?->course->levels()->first()->topics()->first()]) }}" class="card bg-hover-secondary text-hover-inverse-secondary">
            <div class="card-header">
                <div class="card-title">
                    {{ $userCourse->course->title }}
                </div>
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">{{ $userCourse->status() }}</span>
                </div>
            </div>
            <div class="card-body">
                @if($userCourse->payment?->verified)
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7">
                    <div class="text-muted"><em>Started</em></div>
                    <div class="fs-6 text-gray-800">
                        {{ $userCourse->started_at?->diffForHumans() ?? 'Not started yet' }}
                    </div>
                </div>
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7">
                    <div class="text-muted"><em>Finished</em></div>
                    <div class="fs-6 text-gray-800">
                        {{ $userCourse->started_at?->diffForHumans() ?? 'Not Finished yet' }}
                    </div>
                </div>
                @endif
                @if($userCourse->payment?->verified)
                <!-- <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="" data-bs-original-title="This project 50% completed">
                        <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                @endif
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