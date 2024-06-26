@if ($showFilterDropdown && ($filtersView || count($customFilters)))
<div class="btn-group d-block d-md-inline dropdown w-100">
    <button data-bs-toggle="dropdown" aria-expanded="false" id="filterDropDown" type="button" class="btn dropdown-toggle d-block border border-2 w-100 d-md-inline">
        @lang('Filters')

        @if (count($this->getFiltersWithoutSearch()))
        <span class="badge bg-primary">
            {{ count($this->getFiltersWithoutSearch()) }}
        </span>
        @endif

        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="filterDropDown" role="menu">
        <li>
            @if ($filtersView)
            @include($filtersView)
            @elseif (count($customFilters))
            @foreach ($customFilters as $key => $filter)
            <div wire:key="filter-{{ $key }}" class="p-2">
                <label for="filter-{{ $key }}" class="mb-2">
                    {{ $filter->name() }}
                </label>

                @if ($filter->isSelect())
                @include('livewire-tables::bootstrap-5.includes.filter-type-select')
                @elseif($filter->isDate())
                @include('livewire-tables::bootstrap-5.includes.filter-type-date')
                @endif
            </div>
            @endforeach
            @endif

            @if (count($this->getFiltersWithoutSearch()))
            <div class="dropdown-divider"></div>

            <button wire:click.prevent="resetFilters" x-on:click="open = false" class="dropdown-item text-center">
                @lang('Clear')
            </button>
            @endif
        </li>
    </ul>
</div>
@endif