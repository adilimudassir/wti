<x-layouts.classroom>
    <x-slot name="title">
        {{ $course->title }}'s Class Room
    </x-slot>
    <x-card class="bg-light-primary">eeee
        <x-slot name="body">
            {!! $topic->content !!}
        </x-slot>
        <x-slot name="footer">
            <div class="d-flex justify-content-between g-2">
                <a class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary btn-sm" href="{{ filled($topic->previousTopic) ? route('classroom.show', [$course->slug, $topic->previousTopic->level->title, $topic->previousTopic?->slug]) : '#' }}">
                    Previous
                </a>
                @if($topic->level?->name === $topic->nextTopic?->level?->name)
                <a class="btn btn-primary btn-sm fw-bolder" href="{{ filled($topic->nextTopic) ? route('classroom.show', [$course->slug, $topic->nextTopic->level->title, $topic->nextTopic?->slug]) : '#' }}">
                    Next
                </a>
                @else
                <a class="btn btn-primary btn-sm fw-bolder" href="{{ route('classroom.index') }}">
                    Finish
                </a>
                @endif
            </div>
            <div class="d-grid my-5">
                <x-button name="Leave Classroom" :href="route('classroom.index')" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary fw-bolder" icon="bi bi-arrow-left-square fs-1 text-primary" />
            </div>
        </x-slot>
    </x-card>
</x-layouts.classroom>

<script>
    /**
     * add class to img tag
     */
    document.querySelectorAll('img').forEach(function(img) {
        img.classList.add('img-fluid');
    });
</script>