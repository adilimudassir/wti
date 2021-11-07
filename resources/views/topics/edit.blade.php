<x-layouts.app>
    <x-slot name="title">
        Edit Topic
    </x-slot>
    {{
        html()
            ->modelForm($topic, 'PATCH', route('topics.update', $topic->id))
            ->class('form-horizontal')
        ->open() 
    }}

    <x-card>
        <x-slot name="body">
            @include('topics.form')
        </x-slot>
        <x-slot name="footer">
            <x-form.actions 
                label="Update" 
                :back-route="route('topics.show', [$topic->id, 'course' => $topic->level?->course?->slug])"
            />
        </x-slot>
    </x-card>
    {{ html()->closeModelForm() }}
</x-layouts.app>