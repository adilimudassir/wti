<x-layouts.classroom>
    <x-slot name="title">
        {{ $course->title }}'s Class Room
    </x-slot>
    <x-card>
        <x-slot name="header">
            {{ $topic->title }}
        </x-slot>
        <x-slot name="body">
            {!! $topic->content !!}
        </x-slot>
        <x-slot name="footer">
            <div class="d-flex justify-content-between g-2">
                <a class="btn btn-light-primary btn-sm" href="{{ filled($topic->previousTopic) ? route('classroom.show', [$course->slug, $topic->previousTopic->level->title, $topic->previousTopic?->slug]) : '#' }}">
                    Previous
                </a>
                <a class="btn btn-primary btn-sm fw-bolder" href="{{ filled($topic->nextTopic) ? route('classroom.show', [$course->slug, $topic->nextTopic->level->title, $topic->nextTopic?->slug]) : '#' }}">
                    Next
                </a>
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