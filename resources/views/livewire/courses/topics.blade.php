<div>
    <x-card>
        <x-slot name="header">
            {{ $levels->where('name', $level)->first()->title }} Level Topics
        </x-slot>
        <x-slot name="toolbar">
            <div class="d-flex justify-content-end g-2">
                <select wire:model="level" class="form-select form-select-solid" aria-label="Select example">
                    <option>Filter</option>
                    @foreach($levels as $level)
                    <option value="{{$level->name}}">{{ $level->name }}</option>
                    @endforeach
                </select>
                <x-button :href="route('topics.create', $course->slug)" permission="create-topics" name="new topic" />
            </div>
        </x-slot>
        <x-slot name="body">
            @foreach($topics as $topic)
            <x-card>
                <x-slot name="header">
                    {{ $topic->title }}
                </x-slot>
                <x-slot name="toolbar">
                    @include('topics.actions')
                </x-slot>
                <x-slot name="body">
                    {{ $topic->excerpt }}
                </x-slot>
            </x-card>
            @endforeach
        </x-slot>
    </x-card>
</div>