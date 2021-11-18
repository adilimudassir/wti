<!--begin::Trigger-->
<button type="button" class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
    Actions
    <i class="bi bi-chevron-down"></i>
</button>
<!--end::Trigger-->

<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-250px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <x-button 
            name="view" 
            :href="route('students.show', $model)" 
            permission="read-students" 
            class="menu-link px-3" />
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <x-button 
            name="edit" 
            :href="route('students.edit', $model)" 
            permission="update-students" 
            class="menu-link px-3"
        />
    </div>
    <!--end::Menu item-->

    @if ($model->isActive())
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        @canBeImpersonated($model)
        <x-button.link 
            :href="route('impersonate', $model->id)" 
            class="menu-link px-3" 
            :text="'Login as ' . $model->name" 
            permission="impersonate-students" 
        />
        @endCanBeImpersonated
        <x-button.link 
            :href="route('students.change-password', $model->id)" 
            class="menu-link px-3" 
            :text="'Change Password'" 
            permission="update-students"
        />
    </div>
    @endif
    <!--end::Menu item-->
    <div class="px-3">
        @if ($model->id !== 1 && $model->id !== auth()->id())
        <x-button.delete 
            :href="route('students.delete', $model)" 
            permission="delete-students" 
            class="btn btn-light-primary w-100 px-3"
        >Delete</x-button.delete>
        @endif
    </div>
</div>
<!--end::Menu-->