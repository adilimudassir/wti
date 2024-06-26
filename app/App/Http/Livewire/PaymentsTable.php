<?php

namespace App\Http\Livewire;

use Domains\Payment\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PaymentsTable extends DataTableComponent
{
    public string $method;

    public function query(): Builder
    {
        return Payment::whereMethod($this->method)->orderBy('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Name', 'user.name')
                ->searchable()
                ->sortable()
                ->format(fn ($value, $column, $row) => html()->a(route('students.show', $row), $value)),
            Column::make('Course', 'userCourse.course.title')
                ->format(fn ($value, $column, $row) => html()->a(route('user-courses.show', $row->userCourse->course), $value)),
            Column::make('Account Type', 'userCourse.user.account_type')
                ->searchable()
                ->sortable()
                ->format(fn ($value, $column, $row) =>
                match ($value) {
                    'CORPS MEMBER' => "<span class='badge badge-success'>$value</span>",
                    'REGULAR MEMBER' => "<span class='badge badge-info' >$value</span>",
                    'Staff' => "<span class='badge badge-danger' >$value</span>",
                    default => 'N/A'
                })->asHtml(),
            Column::make('Amount Paid', 'amount')
                ->searchable()
                ->sortable()
                ->format(fn ($value, $column, $row) => currency($value)),
            Column::make('Amount Due', 'amount')
                ->format(fn ($value, $column, $row) => currency($row->amountDue())),
            Column::make('Verified', 'verified')
                ->searchable()
                ->sortable()
                ->format(fn ($value, $column, $row) =>
                match ($row->verified) {
                    true => "<span class='badge badge-circle badge-success'><i class='bi bi-check text-white fs-1'></i></span>",
                    false => "<span class='badge badge-circle badge-danger' ><i class='bi bi-x text-white fs-1'></i></span>",
                    default => 'N/A'
                })->asHtml(),
            Column::make('Created At')
                ->searchable()
                ->sortable()
                ->format(fn ($value, $column, $row) => $value?->toDayDateTimeString()),
            Column::make('Actions')
                ->format(fn ($value, $column, $row) => view('payments.actions')->withModel($row)),
        ];
    }
}
