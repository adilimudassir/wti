<div>
    @include('sweetalert::alert')
    <div class="d-grid">
        @forelse($userCourses as $userCourse)
        @if (!$userCourse->course->topics->count())
        @continue
        @endif
        <div class="mb-10">
            <a href="{{ route('user-courses.show', $userCourse->course->slug) }}" class="card bg-hover-secondary text-hover-inverse-secondary">
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
        </div>
        @empty
        <div class="rounded bg-white border p-10">
            <div class="text-center">
                <h3 class="text-gray-900">No courses found</h3>
            </div>
        </div>
        @endforelse
        @if(!$joinCourse && $courses->count() > 0)
        <div class="rounded text-center bg-light border border-secondary border-dashed d-flex flex-column p-5">
            <div class="h3 d-block my-2">Want to join more courses?</div>
            <br>
            <button class="btn btn-primary mx-2 mb-2 btn-sm" wire:click.prevent="toggleJoin">
                Join
            </button>
        </div>
        @endif
    </div>
    @if($joinCourse)
    <fieldset class="row gap-2 p-5 px-auto">
        <legend>Join New Course</legend>
        @foreach($courses as $course)
        <div class="card mb-5 col-lg-3 col-md-4 col-sm-12 col-xs-12">
            <div class="card-header">
                <h3 class="card-title">{{ $course->title }}</h3>
            </div>
            <div class="card-body">
                {{ $course->description }}
            </div>
            <div class="card-footer">
                <button class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-block w-100 btn-sm" wire:click.prevent="joinCourse({{ $course->id }})">
                    Join
                </button>
            </div>
        </div>
        @endforeach
    </fieldset>
    @endif
</div>