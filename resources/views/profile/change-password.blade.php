<x-layouts.app>
    <x-slot name="title">
        Change User Password
    </x-slot>
    {{ html()->form('PUT', route('user-password.update'))->class('form-horizontal')->open() }}
    @if($errors->updatePassword->any())
    <x-utils.alert type="danger">
        @foreach($errors->updatePassword->all() as $error)
        {{ $error }}<br />
        @endforeach
    </x-utils.alert>
    @endif
    <x-partials.card>
        <x-slot name="body">
            <div class="row">
                @if(Route::is('change-password'))
                <div class="form-group col-lg-12">
                    <x-forms.password name="current password" />
                </div>
                @endif
                <div class="form-group col-lg-12">
                    <x-forms.password name="password" />
                </div>
                <div class="form-group col-lg-12">
                    <x-forms.confirm-password />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-utils.form-submit-actions-buttons :back="route('profile')" />
        </x-slot>
    </x-partials.card>
    {{ html()->form()->close() }}
</x-layouts.app>