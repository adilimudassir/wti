<div {{ $attributes->class(['card card-stretch card-bordered mb-1 card-px-0 card-py-0 p-3']) }}>
    @if (isset($header) || isset($toolbar))
    <div {{ $header->attributes->class(['card-header bg-light px-2 cursor-pointer border']) }}>
        @if(isset($header))
        <h3 class="card-title">{!! $header !!}</h3>
        @endif
        @if (isset($toolbar))
        <div class="card-toolbar d-flex justify-content-end">
            {{ $toolbar }}
        </div>
        @endif
    </div>
    @endif
    @if (isset($body))
    <div {{ $body->attributes->class(['card-body p-2']) }}>
        {{ $body }}
    </div>
    @endif
    @if (isset($footer))
    <div {{ $footer->attributes->class(['card-footer py-2']) }}>
        {{ $footer }}
    </div>
    @endif
</div>