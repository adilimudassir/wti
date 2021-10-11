<form method="POST" action="{{ $action }}" name="{{ $name ?? 'delete-item' }}" class="{{ $formClass ?? 'd-inline' }}">
    @csrf
    @method($method ?? 'POST')

    <button type="submit" class="{{ $buttonClass ?? '' }}">
        {{ $slot }}
    </button>
</form>
