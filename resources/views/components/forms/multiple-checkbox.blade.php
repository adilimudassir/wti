@props([
    'options' => [],
    'name' => '',
    'value' => '',
    'modelValues' => collect([]),
    'chunkNumber' => 5
])

{{
    html()->label(ucfirst($name))->class('control-label text-lg-right pt-2 text-color-dark text-3')
}}
<small class="text-info">(Select all that apply)</small>

@foreach($options->chunk($chunkNumber) as $chunk)
<div class="row">
    @foreach($chunk as $id => $value)
        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 col-12">
            <x-forms.checkbox 
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
