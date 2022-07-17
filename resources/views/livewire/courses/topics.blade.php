<div>
    <x-card>
        <x-slot name="header">
            {{ $levels->where('name', $level)->first()->title }} Level Topics
        </x-slot>
        <x-slot name="toolbar">
            <div class="d-flex row-auto gap-2">
                <select wire:model="level" class="form-select form-control-sm" aria-label="Select example">
                    <option>Filter</option>
                    @foreach($levels as $level)
                    <option value="{{$level->name}}">{{ $level->name }}</option>
                    @endforeach
                </select>
                <x-button :href="route('topics.create', $course->slug)" permission="create-topics" name="new" class="btn btn-sm btn-primary fs-5" />
            </div>
        </x-slot>
        <x-slot name="body">
            @foreach($topics as $topic)
            <fieldset class="border p-5 m-2">
                <legend class="text-muted d-flex justify-content-between">
                    <div>
                        {{ $topic->title }}
                    </div>
                    <div class="ms-auto d-flex justify-content-end gap-1">
                        <x-button name="View" :href="route('topics.show', [$topic->slug, 'course' => $course->slug])" permission="read-topics" class="btn btn-light-success btn-sm" />
                        <x-button name="Edit" :href="route('topics.edit', [$topic->id, 'course' => $course->slug])" permission="update-topics" class="btn btn-light-info btn-sm" />
                        <x-button.delete :href="route('topics.delete', [$topic->id, 'course' => $course->slug])" permission="delete-topics" class="btn btn-light-primary btn-sm">
                            Delete
                        </x-button.delete>
                    </div>
                </legend>
                {{ $topic->excerpt }}
            </fieldset>
            @endforeach
        </x-slot>
    </x-card>
</div>