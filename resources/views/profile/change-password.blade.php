<x-layouts.app>
    <x-slot name="title">
        Change User Password
    </x-slot>
    <x-form method="PUT" :route="route('user-password.update')" :back-route="route('profile')">
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
    </x-form>
</x-layouts.app>