<div class="row">
    <div class="form-group col-lg-12">
        <x-form.text name="name" />
    </div>
    <div class="form form-group col-lg-12">
        <x-form.multiple-checkbox 
            name="permissions" 
            :modelValues="
                Route::is('roles.edit') 
                ? $role->permissions->pluck('name', 'id') 
                : collect([])" 
            :options="$permissions" />
    </div>
</div>