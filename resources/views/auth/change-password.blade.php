<x-layouts.app>
    <x-slot name="title">
        Change User Password
    </x-slot>
    {{ html()->form('PUT', route('user-password.update', $user->id))->class('form-horizontal')->open() }}
    <x-errors />
    @include('partials.messages')
    <x-card>
        <x-slot name="header">
            Change User Password
        </x-slot>
        <x-slot name="body">
            <div class="row">
                @if(Route::is('change-password'))
                <div class="form-group col-lg-12">
                    <x-form.password name="current password" />
                </div>
                @endif
                <div class="form-group col-lg-12">
                    <x-form.password name="password" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.confirm-password />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-form.actions :back-route="route('login')" label="Submit" />
        </x-slot>
    </x-card>
    {{ html()->form()->close() }}
</x-layouts.app>