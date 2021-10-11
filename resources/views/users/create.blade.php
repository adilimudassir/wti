<x-layouts.app>
    <x-slot name="title">
        Create User
    </x-slot>
    {{ html()->form('POST', route('users.store'))->class('form-horizontal')->open() }}
    <x-partials.card>
        <x-slot name="body">
            <div class="row">
                <div class="form-group col-lg-12">
                    <x-forms.text name="name" />
                </div>
                <div class="form-group col-lg-12">
                    <x-forms.email name="email" />
                </div>
                <div class="form-group col-lg-12">
                    <x-forms.password name="password" />
                </div>
                <div class="form-group col-lg-12">
                    <x-forms.confirm-password />
                </div>
                <div class="form form-group col-lg-12">
                    <x-forms.multiple-checkbox name="roles" :options="$roles" />
                </div>
                <div class="form-group col-lg-12">
                    <x-forms.checkbox name="status" labelName="Active" :checked="true" value="Active" />
                </div>
                <div class="form-group col-lg-12">
                    <x-forms.checkbox name="confirmed" labelName="Yes" :checked="true" value="True" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-utils.form-submit-actions-buttons :back="route('users.index')" />
        </x-slot>
    </x-partials.card>
    {{ html()->form()->close() }}
</x-layouts.app>