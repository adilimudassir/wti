<x-layouts.app>
    <x-slot name="title">
        View User
    </x-slot>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <x-utils.link :href="route('users.index')" class="btn btn-sm btn-light-primary" text="Back" icon="bi bi-chevron-left" />
        </div>
        <div>
            <x-utils.action-button name="edit" :href="route('users.edit', $user->id)" permission="update-users" class="btn btn-sm btn-primary" icon="bi bi-pencil fs-3" />
        </div>
    </div>
    <x-partials.tabs>
        <x-slot name="headers">
            <x-partials.tab-header id="overview" :active="true">
                Overview
            </x-partials.tab-header>
        </x-slot>
        <x-slot name="contents">
            <x-partials.tab-content id="overview" :active="true">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <x-partials.badge :type="$user->isActive() ? 'success' : 'danger'" :name="$user->isActive() ? 'Active' : 'Inactive'" />
                        </td>
                    </tr>
                    <tr>
                        <th>Confirmed</th>
                        <td>
                            <x-partials.badge :type="$user->hasVerifiedEmail() ? 'success' : 'danger'" :name="$user->hasVerifiedEmail() ? 'Yes' : 'No'" />
                        </td>
                    </tr>
                    <tr>
                        <th>Last Login Date</th>
                        <td>{{ optional($user->last_login_at)->diffForHumans() }}</td>
                    </tr>
                    <tr>
                        <th>Last Login IP</th>
                        <td>{{ $user->last_login_ip }}</td>
                    </tr>
                </table>
            </x-partials.tab-content>
        </x-slot>
    </x-partials.tabs>
</x-layouts.app>