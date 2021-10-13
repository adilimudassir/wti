@props([
    'options' => [],
    'name' => '',
    'value' => '',
    'modelValues' => collect([]),
    'chunkNumber' => 5
])

{{
    html()->label(ucfirst($name))->class('form-label fs-6 fw-bolder text-dark my-3')
}}
<small class="text-primary">(Select all that apply)</small>

@foreach($options->chunk($chunkNumber) as $chunk)
<div class="row">
    @foreach($chunk as $id => $value)
        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 col-12">
            <x-form.checkbox 
            :id="$id"
            :name="$name"
            :checked="$modelValues->contains($value) ? true : false"
            :value="ucfirst($id)"
            :labelName="ucfirst($value)" 
            multiple="true" 
        />
        </div>
    @endforeach
</div>
@endforeach
