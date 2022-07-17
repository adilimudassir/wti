<x-layouts.app>
    <x-slot name="title">
        {{ $course->title }}
    </x-slot>
    <x-card>
        <x-slot name="body">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('courses.overview') ? 'active' : '' }}" href="{{ route('courses.overview', $course) }}">Overview</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('courses.topics') ? 'active' : '' }}" href="{{ route('courses.topics', $course) }}">Topics</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('courses.batches') ? 'active' : '' }}" href="{{ route('courses.batches', $course) }}">Batches</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('courses.levels') ? 'active' : '' }}" href="{{ route('courses.levels', $course) }}">Levels</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('courses.students') ? 'active' : '' }}" href="{{ route('courses.students', $course) }}">Students</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('courses.cost') ? 'active' : '' }}" href="{{ route('courses.cost', $course) }}">Cost</a>
                </li>
            </ul>
        </x-slot>
    </x-card>
    @yield('content')
</x-layouts.app>