<x-layouts.app>
    <x-slot name="title">
        Edit User
    </x-slot>

    {{
        html()
            ->modelForm($user, 'PATCH', route('users.update', $user->id))
            ->class('form-horizontal')
        ->open() 
    }}
    <x-card>
        <x-slot name="body">
            <div class="row">
                <div class="form-group col-lg-12">
                    <x-form.text name="name" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.email name="email" />
                </div>
                <div class="form form-group col-lg-12">
                    <x-form.multiple-checkbox name="roles" :modelValues="$user->getRoleNames()" :options="$roles" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.checkbox name="status" :checked="$user->isActive()" labelName="Active" value="Active" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.checkbox name="confirmed" :checked="$user->hasVerifiedEmail()" labelName="Yes" value="True" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-form.actions label="Update" :back-route="route('users.show', $user)" />
        </x-slot>
    </x-card>
    {{ html()->closeModelForm() }}

</x-layouts.app>