@if($breadcrumbs)
<uoll class="breadcrumb text-muted fw-bold fs-6 my-1">
    @foreach($breadcrumbs as $breadcrumb)
    @if($breadcrumb->url && !$loop->last)
    <li class="breadcrumb-item pe-3">
            <a href="{{$breadcrumb->url}}">{{$breadcrumb->title}} </a>
    </li>
    @else
    <li class="breadcrumb-item pe-3 text-muted">{{ $breadcrumb->title }}</li>
    @endif
    @endforeach
    </ol>
    @endif