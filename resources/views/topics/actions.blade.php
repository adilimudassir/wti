<!--begin::Trigger-->
<button type="button" class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
    Actions
    <i class="bi bi-chevron-down"></i>
</button>
<!--end::Trigger-->

<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <x-button name="view" :href="route('topics.show', [$topic->slug, 'course' => $course->slug])" permission="read-topics" class="menu-link px-3" />
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <x-button name="edit" :href="route('topics.edit', [$topic->id, 'course' => $course->slug])" permission="update-topics" class="menu-link px-3" />
    </div>
    <!--end::Menu item-->
    <div class="px-3">
        <x-button.delete :href="route('topics.delete', [$topic->id, 'course' => $course->slug])" permission="delete-topics" class="btn btn-light-primary w-100 px-3 btn-sm">Delete</x-button.delete>
    </div>
</div>
<!--end::Menu-->