<x-layouts.app>
    <x-slot name="title">
        View topic
    </x-slot>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <x-button.link :href="route('courses', [$topic->level?->course?->slug, 'course' => $topic->level?->course?->slug])" class="btn btn-sm btn-light-primary" text="Back" icon="bi bi-chevron-left" />
        </div>
        <div>
            <x-button name="edit" :href="route('topics.edit', [$topic->id, 'course' => $topic->level?->course?->slug])" permission="update-topics" class="btn btn-sm btn-primary" icon="bi bi-pencil" />
        </div>
    </div>
    <x-card>
        <x-slot name="body">
            <div class="">
                <p> <strong>Level</strong> <br><span class="my-10">{{ $topic->level?->title }}<span></p>
                <div class="separator my-10"></div>
                <p> <strong>Title</strong> <br><span class="my-10">{{ $topic->title }}<span></p>
                <div class="separator my-10"></div>
                <p> <strong>Excerpt</strong> <br><span class="my-10">{{ $topic->excerpt }}<span></p>
                <div class="separator my-10"></div>
                <p> <strong>Content</strong> <br><span class="my-10">{!! $topic->content !!}<span></p>
                <div class="separator my-10"></div>
            </div>

        </x-slot>
    </x-card>
</x-layouts.app>