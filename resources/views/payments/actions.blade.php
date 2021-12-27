<!--begin::Trigger-->
<button type="button" class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
    Actions
    <i class="bi bi-chevron-down"></i>
</button>
<!--end::Trigger-->

<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-100px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <x-button name="view" :href="route('payments.show', $model)" permission="read-payments" class="menu-link px-3" />
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <x-button name="edit" :href="route('payments.edit', $model)" permission="update-payments" class="menu-link px-3" />
    </div>
    <!--end::Menu item-->
    <div class="px-3">
        <x-button.delete :href="route('payments.delete', $model)" permission="delete-payments" class="btn btn-light-primary w-100 px-3 btn-sm">Delete</x-button.delete>
    </div>
</div>
<!--end::Menu-->