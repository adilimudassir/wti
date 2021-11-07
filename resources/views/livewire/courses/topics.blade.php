<div>
    <div class="d-flex flex-wrap flex-stack my-5">
        <h3 class="fw-bolder my-2">{{ $levels->where('name', $level)->first()->title }} Level Topics</h3>
        <div class="d-flex flex-wrap my-2">
            <div class="">
                <select wire:model="level" class="form-select form-select-solid" aria-label="Select example">
                    <option>Filter</option>
                    @foreach($levels as $level)
                    <option value="{{$level->name}}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
            <x-button :href="route('topics.create', $course->slug)" permission="create-topics" name="new topic" />
        </div>
    </div>
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
</div>