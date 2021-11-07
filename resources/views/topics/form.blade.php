<div class="row">
    <div class="form-group col-lg-12">
        <x-form.select name="level_id" label="Level" :options="$levels" />
    </div>
    <div class="form-group col-lg-12">
        <x-form.text name="title" />
    </div>
    <div class="form-group col-lg-12">
        <x-form.textarea name="excerpt" />
    </div>
    <div class="form-group col-lg-12">
        <x-form.text-editor name="content" />
    </div>
</div>