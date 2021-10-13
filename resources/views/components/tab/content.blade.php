@props([
'id' => '',
'active' => false
])

<div id="{{ $id }}" class="tab-pane fade show {{ $active ? 'active' : '' }}" role="tabpanel">
    {{ $slot }}
</div>