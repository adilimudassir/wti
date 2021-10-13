@if (isset($permission))
    @if (auth()->user()->can($permission))
        <x-form.button
            :action="$href"
            method="delete"
            name="delete-item"
            :button-class="$class"
        >
             {{ $text ?? 'Delete' }}
        </x-form.button>
    @endif
@else
    <x-form.button
        :action="$href"
        method="delete"
        name="delete-item"
        :button-class="$class"
    >
         {{ $text ?? 'Delete' }}
    </x-form.button>
@endif
