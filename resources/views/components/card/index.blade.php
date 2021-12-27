<div class="card card-stretch card-bordered my-1">
    @if (isset($header) || isset($toolbar))
    <div class="card-header cursor-pointer">
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
    <div class="card-body">
        {{ $body }}
    </div>
    @endif
    @if (isset($footer))
    <div class="card-footer">
        {{ $footer }}
    </div>
    @endif
</div>