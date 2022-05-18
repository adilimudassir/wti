<x-layouts.classroom aside="on">
    <x-slot name="title">
        Class Room
    </x-slot>
    <x-slot name="styles">
        <style>
            fieldset,
            legend {
                all: revert;
            }
        </style>
    </x-slot>
    Welcome, {{ auth()->user()->name }}

    @php

    $userCourse = session('userCourse');

    @endphp

    <div class="row mt-5">
        @if(session()->has('userCourse'))
        <div class="card g-5">
            <div class="card-header">
                <div class="card-title gap-2">
                    {{ $userCourse->course->title }}
                    @if($userCourse->paymentStatus() !== 'Pending Purchase')
                    <div class="text-muted fs-6 fst-italic">
                        <strong>Started since</strong> <em>{{ $userCourse->started_at?->diffForHumans() ?? 'Not started yet' }}</em>
                    </div>
                    @if($userCourse->finished_at)
                    <div class="text-muted fs-6 fst-italic">
                        <strong>Finished On</strong> <em>{{ $userCourse->finished_at?->diffForHumans() }}</em>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bolder me-auto px-12 py-3">{{ $userCourse->status() }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="accordion accordion-flush" id="classroom">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed bg-light-primary bg-active-primary text-primary fs-3" type="button" data-bs-toggle="collapse" data-bs-target="#outline" aria-expanded="false" aria-controls="outline">
                                Course Outline <small class="text-muted my-4 mx-2 fs-6 font-italic">(Click to expand)</small>
                            </button>
                        </h2>
                        <div id="outline" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#classroom">
                            <div class="accordion-body">
                                <div class="accordion" id="course-list">
                                    @foreach($userCourse?->course?->levels ?? [] as $level)
                                    <div class="accordion-item gap-2">
                                        <h2 class="accordion-header my-3" id="flush-headingOne">
                                            <button class="accordion-button collapsed bg-light-primary text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#level_{{ $level->id }}" aria-expanded="false" aria-controls="level_{{ $level->id }}">
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
                            </div>
                        </div>
                    </div>
                </div>
                <fieldset class="my-5 row">
                    <legend class="fs-3 pl-0 py-5 ml-1">
                        <span>Choose a level to begin </span>
                        <i class="fa fa-angle-down fa-xl mt-2 text-primary"></i>
                    </legend>
                    @forelse($userCourse->allowedLevels() as $key => $level)
                    <a href="{{ route('classroom.show', [$userCourse?->course->slug, $level->title, $level->topics()->first()]) }}" class="card col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="bg-light-primary text-primary bg-hover-primary text-hover-white my-1 @if($key === 0) ml-0 mr-1 @else m-1 @endif border card-body lh-xl ls-3">
                            {{ $level->title }} ({{ $level->name }}) <br>
                            <small class="text-muted text-hover-white">{{ $level->description }}</small>
                        </div>
                    </a>
                    @empty
                    <div class="text-center fs-3 text-primary ">
                        <img src="{{ asset('assets/media/illustrations/empty.svg')}}" alt="" class="w-25 min-w-150px h-auto min-h-150px" />
                        <p>It seems you have'nt purchased this course yet</p>
                        @if($userCourse->canMakePayment())
                        <x-button name="Proceed to payment" :href="route('payments.create', ['user_course_id' => $userCourse->id])" permission="create-payments" class="btn btn-sm btn-primary" icon="bi bi-plus" />
                        @endif
                    </div>
                    @endforelse
                </fieldset>
            </div>
            <div class="card-footer">
                <fieldset>
                    <legend>Progress <span class="badge badge-primary"> {{ $userCourse->progress() }}%</span></legend>
                    <div class="h-4px  bg-light my-2" data-bs-toggle="tooltip" title="{{ $userCourse->progress() }}% Complete" data-bs-original-title="This course is {{ $userCourse->progress() }}% completed">
                        <div class="bg-primary rounded h-10px" role="progressbar" style="width: {{ $userCourse->progress() }}%" aria-valuenow="{{ $userCourse->progress() }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </fieldset>
            </div>
        </div>
        @else
        <div class="rounded bg-white border p-10">
            <div class="text-center d-grid gap-2">
                {{
                    html()->form('GET', route('classroom.index'))
                        ->class('form-horizontal')
                        ->open()
                }}

                <input type="text" class="form-control form-control-solid" name="matriculation_number" placeholder="Insert Matriculation Number here" />
                <button class="btn btn-primary my-2">Submit</button>
                {{ html()->form()->close() }}
            </div>
        </div>
        @endif
    </div>
</x-layouts.classroom>