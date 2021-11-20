<div class="container-fluid">
    @if(session()->get('flash_success'))
    <x-alert type="success">
        {{ session()->get('flash_success') }}
    </x-alert>
    @endif

    @if(session()->get('flash_warning'))
    <x-alert type="warning">
        {{ session()->get('flash_warning') }}
    </x-alert>
    @endif

    @if(session()->get('flash_info') || session()->get('flash_message'))
    <x-alert type="info">
        {{ session()->get('flash_info') }}
    </x-alert>
    @endif

    @if(session()->get('flash_danger'))
    <x-alert type="danger">
        {{ session()->get('flash_danger') }}
    </x-alert>
    @endif

    @if(session()->get('status'))
    <x-alert type="success">
        {{ session()->get('status') }}
    </x-alert>
    @endif

    @if(session()->get('resent'))
    <x-alert type="success">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </x-alert>
    @endif

    @if(session()->get('verified'))
    <x-alert type="success">
        {{ __('Thank you for verifying your e-mail address.') }}
    </x-alert>
    @endif
</div>