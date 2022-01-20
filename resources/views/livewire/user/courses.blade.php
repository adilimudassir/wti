<div>
    @include('sweetalert::alert')
    <div class="d-grid">
        @forelse($userCourses as $userCourse)
        @if (!$userCourse->course->topics->count())
        @continue
        @endif
        <div class="mb-10">
            <a href="{{ route('user-courses.show', $userCourse->course->slug) }}" class="card bg-hover-secondary text-hover-inverse-secondary shadow-lg">
                <div class="card-header">
                    <div class="card-title">
                        {{ $userCourse->course->title }}
                    </div>
                    <div class="card-toolbar">
                        <span class="badge badge-light-primary fw-bolder me-auto px-12 py-3">{{ $userCourse->status() }}</span>
                    </div>
                </div>
                <div class="card-footer d-grid">
                    <a href="{{ route('user-courses.show', $userCourse->course->slug) }}" class="btn btn-primary mx-2 mb-2 btn-lg">
                        Proceed to Course
                    </a>
                </div>
                {{--
                <div class="card-body">
                    {!!  $userCourse->course->description !!}
                    @if($userCourse->paymentStatus() !== 'Pending Purchase')
                        <div class="text-muted fs-4">
                            <strong>Started since</strong> <em>{{ $userCourse->started_at?->diffForHumans() ?? 'Not started yet' }}</em>
        </div>
        @if($userCourse->finished_at)
        <div class="separator my-10"></div>
        <div class="text-muted fs-4">
            <em>Finished On</em> {{ $userCourse->finished_at?->diffForHumans() }}
        </div>
        @endif
        @endif
    </div>
    <div class="card-footer">
        <div class="h-4px  bg-light my-2" data-bs-toggle="tooltip" title="{{ $userCourse->progress() }}% Complete" data-bs-original-title="This course is {{ $userCourse->progress() }}% completed">
            <div class="bg-primary rounded h-10px" role="progressbar" style="width: {{ $userCourse->progress() }}%" aria-valuenow="{{ $userCourse->progress() }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    --}}
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
<div class="rounded text-center bg-light border border-secondary border-dashed d-grid d-flex flex-column p-5">
    <div class="h3 d-block my-2">Want to join more courses?</div>
    <br>
    <button class="btn btn-light-primary mx-2 mb-2 btn-lg" wire:click.prevent="toggleJoin">
        Click Here
    </button>
</div>
@endif
</div>
@if($joinCourse)
<fieldset class="row gap-2 mt-5 px-auto">
    <legend>Join New Course</legend>
    @foreach($courses as $course)
    <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-secondary">
        <div class="card-header">
            <h3 class="card-title">
                {{ $course->title }}
            </h3>
        </div>
        <div class="card-body">
            {{ $course->description }}
            <div class="separator my-10"></div>
            <div class="d-flex flex-column">
                <li class="d-flex align-items-center py-2">
                    <span class="bullet bullet-vertical bg-danger me-5"></span> <span class="text-gray-800">{{ $course->duration }}</span>
                </li>
                <li class="d-flex align-items-center py-2">
                    <span class="bullet bullet-vertical bg-danger me-5"></span> <span class="text-gray-800">{{ currency($course->cost) }}</span>
                </li>
                <li class="d-flex align-items-center py-2">
                    <span class="bullet bullet-vertical bg-danger me-5"></span> <span class="text-gray-800">
                        Weekly Zoom Classes & Mentoring
                    </span>
                </li>
                <li class="d-flex align-items-center py-2">
                    <span class="bullet bullet-vertical bg-danger me-5"></span> <span class="text-gray-800">
                        Lifetime Access
                    </span>
                </li>
            </div>
            <div class="separator my-10"></div>
            <label class="form-label fs-6 fw-bolder text-dark mt-5" for="userCourse.batch_id">
                Select Batch
            </label>
            <select class="form-control @error('userCourse.batch_id') is-invalid @enderror" name="userCourse.batch_id" id="userCourse.batch_id" wire:model="userCourse.batch_id">
                <option value=""> Select Batch</option>
                @foreach($course->batches as $batch)
                <option @if ($batch->active) 'selected' @endif value="{{ $batch->id }}">{{ $batch->name }}
                    @if($batch->active)
                    (Current batch)
                    @endif
                </option>
                @endforeach
            </select>
            @error('userCourse.batch_id') <span class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</span> @enderror
        </div>
        <div class="card-footer d-grid">
            <button class="btn btn-primary btn-lg" wire:click.prevent="joinCourse({{ $course->id }})">
                Join
            </button>
        </div>
    </div>
    @endforeach
</fieldset>
@endif
</div>