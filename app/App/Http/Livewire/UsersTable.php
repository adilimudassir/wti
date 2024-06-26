<?php

namespace App\Http\Livewire;

use Domains\Auth\Models\Role;
use Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UsersTable extends DataTableComponent
{
    public function query(): Builder
    {
        return User::query()
            ->orderBy('created_at', 'DESC')
            ->when($this->getFilter('role'), fn ($query, $role) => $query->role($role));
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

    public function filters(): array
    {
        $roles = [
            '' => 'Any'
        ];

        foreach (Role::all() as $role) {
            $roles[$role->name] = $role->name;
        }

        return [
            'role' => Filter::make('role')
                ->select($roles),
        ];
    }
}
