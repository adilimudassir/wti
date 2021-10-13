<x-layouts.app>
    <x-slot name="title">
        Change User Password
    </x-slot>
    <x-form method="POST" :route="route('users.change-password', $user->id)" :back-route="route('users.show', $user->id)">
        <div class="row">
            <div class="form-group col-lg-12">
                <x-form.password name="password" />
            </div>
            <div class="form-group col-lg-12">
                <x-form.confirm-password />
            </div>
        </div>
    </x-form>
</x-layouts.app>