<x-layouts.app>
    <x-slot name="title">
        Create Topic
    </x-slot>
    {{
            html()->form('POST', route('topics.store', $course->slug))
                ->class('form-horizontal')
                ->open()
        }}
    <x-card>
        <x-slot name="body">
            @include('topics.form')
        </x-slot>
        <x-slot name="footer">
            <x-form.actions label="Submit" :back-route="route('courses', $course->slug)" />
        </x-slot>
    </x-card>

    {{ html()->form()->close() }}
</x-layouts.app>