<x-layouts.app>
    <x-slot name="title">
        View Role
    </x-slot>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <x-button.link
                :href="route('roles.index')" 
                class="btn btn-sm btn-light-primary" 
                text="Back" 
                icon="bi bi-chevron-left" 
            />
        </div>
        <div>
            <x-button
            name="edit"
            :href="route('roles.edit', $role)"
            permission="update-roles"
            class="btn btn-sm btn-primary"
            icon="bi bi-pencil" 
        />
        </div>
    </div>
    <x-card>
        <x-slot name="body">
            <span class="fw-bolder">Name</span>
            <div class="card-title">
                <span class="pl-2">{{ $role->name }}</span>
                <small>{{ $role->description }} </small>
            </div>
            <div class="separator my-10"></div>
            <span class="fw-bolder">Permissions</span>
            <div class="d-flex pl-2 flex-column">
                @foreach($role->permissions as $key => $permission)
                <li class="d-flex align-items-center py-2">
                    <span class="bullet me-5"></span> {{ $permission->description }}
                </li>
                @endforeach
            </div>
            </fieldset>
        </x-slot>
    </x-card>
</x-layouts.app>