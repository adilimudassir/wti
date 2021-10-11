<x-layouts.app>
    <x-slot name="title">
        Change User Password
    </x-slot>
    {{ html()->form('POST', route('users.change-password', $user->id))->class('form-horizontal')->open() }}
    <x-partials.card>
        <x-slot name="body">
            <div class="row">
                <div class="form-group col-lg-12">
                    <x-forms.password name="password" />
                </div>
                <div class="form-group col-lg-12">
                    <x-forms.confirm-password />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-utils.form-submit-actions-buttons :back="route('users.show', $user->id)" />
        </x-slot>
    </x-partials.card>
    {{ html()->form()->close() }}
</x-layouts.app>