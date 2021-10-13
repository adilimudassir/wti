@if($breadcrumbs)
<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
    @foreach($breadcrumbs as $breadcrumb)
    @if($breadcrumb->url && !$loop->last)
    <li class="breadcrumb-item text-muted">
        <span>
            <x-button.link :href="$breadcrumb->url" :text="$breadcrumb->title" />
        </span>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    @else
    <li class="breadcrumb-item text-dark">{{ $breadcrumb->title }}</li>
    @endif
    @endforeach
</ul>
@endif