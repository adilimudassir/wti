<x-layouts.app>
    <x-slot name="title">
        View topic
    </x-slot>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <x-button.link :href="route('courses.overview', [$topic->level?->course?->slug, 'course' => $topic->level?->course?->slug])" class="btn btn-sm btn-light-primary" text="Back" icon="bi bi-chevron-left" />
        </div>
        <div>
            <x-button name="edit" :href="route('topics.edit', [$topic->id, 'course' => $topic->level?->course?->slug])" permission="update-topics" class="btn btn-sm btn-primary" icon="bi bi-pencil" />
        </div>
    </div>
    <x-card>
        <x-slot name="body">
            <div class="d-grid gap-5">
                <fieldset class="border p-5">
                    <legend class="text-muted">Level</legend>
                    {{ $topic->level?->title }}
                </fieldset>
                <fieldset class="border p-5">
                    <legend class="text-muted">Title</legend>
                    {{ $topic->title }}
                </fieldset>
                <fieldset class="border p-5">
                    <legend class="text-muted">Excerpt</legend>
                    {{ $topic->excerpt }}
                </fieldset>
                <fieldset class="border p-5">
                    <legend class="text-muted">Content</legend>
                    {!! $topic->content !!}
                </fieldset>
            </div>
        </x-slot>
    </x-card>
</x-layouts.app>