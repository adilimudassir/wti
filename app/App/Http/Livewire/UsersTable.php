<?php

namespace App\Http\Livewire;

use Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UsersTable extends DataTableComponent
{
    public function query(): Builder
    {
        return User::whereAccountType('STAFF');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Name')
                ->searchable()
                ->sortable()
                ->format(fn ($value, $column, $row) => html()->a(route('users.show', $row), $value)),
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Role', 'roles_label'),
            Column::make('Created At')
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->format(fn ($value, $column, $row) => view('users.actions')->withModel($row)),
        ];
    }
}
