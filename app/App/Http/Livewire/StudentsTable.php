<?php

namespace App\Http\Livewire;

use Domains\Auth\Models\User;
use Domains\Student\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class StudentsTable extends DataTableComponent
{
    public function query(): Builder
    {
        return User::role('Student');
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
                ->format(fn ($value, $column, $row) => html()->a(route('students.show', $row), $value)),
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Account Type')
                ->sortable(),
            Column::make('State')
                ->sortable(),
            Column::make('State Code')
                ->sortable()
                ->searchable(),
            Column::make('Created At')
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->format(fn ($value, $column, $row) => view('students.actions')->withModel($row)),
        ];
    }
}
