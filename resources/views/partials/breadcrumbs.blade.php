@if($breadcrumbs)
<ol class="breadcrumb text-muted fw-bold fs-8 my-1">
    @foreach($breadcrumbs as $breadcrumb)
    @if($breadcrumb->url && !$loop->last)
    <li class="breadcrumb-item">
            <a href="{{$breadcrumb->url}}">{{$breadcrumb->title}} </a>
    </li>
    @else
    <li class="breadcrumb-item text-muted">{{ $breadcrumb->title }}</li>
    @endif
    @endforeach
    </ol>
    @endif