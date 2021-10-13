<x-layouts.app>
    <x-slot name="title">
        Change User Password
    </x-slot>
    {{ html()->form('PUT', route('user-password.update'))->class('form-horizontal')->open() }}
    @if($errors->updatePassword->any())
    <x-alert type="danger">
        @foreach($errors->updatePassword->all() as $error)
        {{ $error }}<br />
        @endforeach
    </x-alert>
    @endif
    <x-card>
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
            <x-form.actions :back-route="route('profile')" />
        </x-slot>
    </x-card>
    {{ html()->form()->close() }}
</x-layouts.app>