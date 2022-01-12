<form method="POST" action="{{ $action }}" name="{{ $name ?? 'delete-item' }}" class="{{ $formClass ?? 'd-inline' }}">
    @csrf
    @method($method ?? 'POST')

    <button type="submit" class="{{ $buttonClass ?? 'btn btn-light-primary btn-sm' }}">
        {{ $slot }}
    </button>
</form>