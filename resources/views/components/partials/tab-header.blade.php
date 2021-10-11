@props([
    'id' => '',
    'active' => false
])

<li class="nav-item {{ $active ? 'active' : '' }}">
    <a class="nav-link" href="#{{ $id }}"  data-bs-toggle="tab">{{ $slot }}</a>
</li>