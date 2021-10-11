<div class="row justify-content-center">
    <div class="col-md-12">
        @if($errors->any())
        <x-utils.alert type="danger">
            @foreach($errors->all() as $error)
            {{ $error }}<br />
            @endforeach
        </x-utils.alert>
        @endif
    </div>
</div>