@if(Route::is('classroom.show'))
@foreach($course->levels as $level)
<div class="menu-item">
    <div class="menu-content pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{$level->title}}</span>
    </div>
</div>
@foreach($level->topics()->orderBy('id', 'ASC')->get() as $topic)
<div class="menu-item">
    <a href="{{ route('classroom.show', [$topic->level->course->slug, $topic->level->title, $topic->slug]) }}" class="menu-link {{ $topic->slug === request('topic') ? 'active' : '' }}">
        <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">{{ $topic->title }}</span>
    </a>
</div>
@endforeach
@endforeach
@endif