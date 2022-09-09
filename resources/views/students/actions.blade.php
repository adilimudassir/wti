<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <button id="btnGroupDrop1" type="button" class="btn btn-light-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Actions
    </button>
    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <li>
            <x-button name="view" :href="route('students.show', $model)" permission="read-students" class="dropdown-item" />
        </li>
        <li>
            <x-button name="edit" :href="route('students.edit', $model)" permission="update-students" class="dropdown-item" />

        </li>
        @canBeImpersonated($model)
        <li>
            <x-button.link :href="route('impersonate', $model->id)" class="dropdown-item" :text="'Login as ' . $model->name" permission="impersonate-students" />
        </li>
        @endCanBeImpersonated
        <li>
            <x-button.link :href="route('students.change-password', $model->id)" class="dropdown-item" :text="'Change Password'" permission="update-students" />
        </li>
        <li>
            @if ($model->id !== 1 && $model->id !== auth()->id())
            <x-button.delete :href="route('students.delete', $model)" permission="delete-students" class="btn btn-light-primary w-100 px-3 btn-sm">Delete</x-button.delete>
            @endif
        </li>
    </ul>
</div>