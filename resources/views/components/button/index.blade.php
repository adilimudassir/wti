@props(['permission' => false, 'href' => '', 'class' => 'btn btn-sm btn-primary', 'icon' => false, 'name' => ''])

@if (isset($permission))
@if (auth()->user()->can($permission))
<x-button.link :href="$href" :class="$class" :icon="$icon" :text="ucfirst($name)" />
@endif
@else
<x-button.link :href="$href" :class="$class" :icon="$icon" :text="ucfirst($name)" />
@endif