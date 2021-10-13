<div class="row justify-content-center">
    <div class="col-md-12">
        @if($errors->any())
        <x-alert type="danger">
            @foreach($errors->all() as $error)
            {{ $error }}<br />
            @endforeach
        </x-alert>
        @endif
    </div>
</div>