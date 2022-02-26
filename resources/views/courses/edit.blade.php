<x-layouts.app>
    <x-slot name="title">
        {{ $course->title }}
    </x-slot>
    {{
        html()
            ->modelForm($course, 'PATCH', route('courses.update', $course->id))
            ->class('form-horizontal')
        ->open() 
    }}

    <x-card>
        <x-slot name="body">
            <x-form.text name="title"/>
            <x-form.text name="duration" />
            <x-form.textarea name="description" name="description" />
            <x-form.text-editor name="outline" name="outline" />
        </x-slot>
        <x-slot name="footer">
            <x-form.actions label="Update" :back-route="route('courses', $course)" />
        </x-slot>
    </x-card>
    {{ html()->closeModelForm() }}
</x-layouts.app>