<div class="justify-content-center container-fluid">
    @if($errors->any())
    <x-alert type="danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
    @endif

    @if($errors->updatePassword->any())
    <x-alert type="danger">
        <ul>
            @foreach($errors->updatePassword->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
    @endif
</div>