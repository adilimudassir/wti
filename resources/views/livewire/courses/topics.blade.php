
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
                    <div>
                        @include('topics.actions')
                    </div>
                </legend>
                {{ $topic->excerpt }}
            </fieldset>
            @endforeach
        </x-slot>
    </x-card>
</div>