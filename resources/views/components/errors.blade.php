<div class="container-fluid">
    @if($errors->any() && (substr(url()->current(), -1) == 'create' || substr(url()->current(), -1) == 'edit'))
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