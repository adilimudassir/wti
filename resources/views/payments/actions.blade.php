<div class="ms-auto d-flex justify-content-end gap-1">
    <x-button name="View" :href="route('payments.show', $model)" permission="read-payments" class="btn btn-light-success btn-sm" />
    <x-button name="Edit" :href="route('payments.edit', $model)" permission="update-payments" class="btn btn-light-info btn-sm" />
    <x-button.delete :href="route('payments.delete', $model)" permission="delete-payments" class="btn btn-light-primary btn-sm">
        Delete
    </x-button.delete>
</div>