<x-layouts.app>
    <x-slot name="title">
        Create User
    </x-slot>
    <x-form method="POST" :route="route('users.store')" :back-route="route('users.index')">
        <div class="row">
            <div class="form-group col-lg-12">
                <x-form.text name="name" />
            </div>
            <div class="form-group col-lg-12">
                <x-form.email name="email" />
            </div>
            <div class="form-group col-lg-12">
                <x-form.password name="password" />
            </div>
            <div class="form-group col-lg-12">
                <x-form.confirm-password />
            </div>
            <div class="form form-group col-lg-12">
                <x-form.multiple-checkbox name="roles" :options="$roles" />
            </div>
            <div class="form-group col-lg-12">
                <x-form.checkbox name="status" labelName="Active" :checked="true" value="Active" />
            </div>
            <div class="form-group col-lg-12">
                <x-form.checkbox name="confirmed" labelName="Yes" :checked="true" value="True" />
            </div>
        </div>
    </x-form>
</x-layouts.app>