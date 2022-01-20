<div class="menu-item">
    <a class="menu-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</div>
<div class="menu-content">
    <div class="separator mx-1 my-4"></div>
</div>
@if(Route::is('classroom.show'))
@foreach($course->levels as $level)
<div class="menu-item">
    <div class="menu-content pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{$level->title}}</span>
    </div>
</div>
@foreach($level->topics()->orderBy('id', 'ASC')->get() as $topic)
@php
$model = $topic->userCourseTopics()->where('user_course_id', $userCourse->id)->first() ?? null;
@endphp
<div class="menu-item">
    <a href="{{ route('classroom.show', [$topic->level->course->slug, $topic->level->title, $topic->slug]) }}" class="menu-link {{ $topic->slug === request('topic') ? 'active' : '' }}">
        <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">{{ $topic->title }}</span>
        @if($model)
        <span class='badge badge-light-primary'><i class='bi bi-check'></i></span>
        @endif
    </a>
</div>
@endforeach
@endforeach
@endif