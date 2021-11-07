@props(['class' => 'btn btn-sm btn-light-primary', 'href' => '', 'text' => '', 'icon' => false])

@if (isset($permission))
@can($permission))
<a {{ $attributes->merge(['href' => $href, 'class' => $class]) }}>
    @if ($icon)<i class="{{ $icon }}"></i>@endif
    {{ ucfirst($text) }}
</a>
@endcan
@else
<a {{ $attributes->merge(['href' => $href, 'class' => $class]) }}>
    @if ($icon)<i class="{{ $icon }}"></i>@endif
    {{ ucfirst($text) }}
</a>
@endif