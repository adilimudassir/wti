<x-layouts.app>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-card>
        <x-slot name="body">
            @if(auth()->user()->hasRole('Student'))
            <div class="ratio" style="--bs-aspect-ratio: 50%;">
                <iframe src="{{ asset('videos/fx.mp4')}}" allowfullscreen></iframe>
            </div>
            @else
            @endif
        </x-slot>
    </x-card>
</x-layouts.app>