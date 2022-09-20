<?php

namespace App\Http\Livewire;

use Domains\Course\Models\Course;
use Domains\Course\Models\UserCourse;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class CourseStudentsTable extends DataTableComponent
{
    public Course $course;

    public function query(): Builder
    {
        return UserCourse::where('course_id', $this->course->id)
            ->when($this->getFilter('batch'), fn ($query, $batch) => $query->where('batch_id', $batch));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Name', 'user.name')
                ->searchable(fn ($builder, $term) =>
                    $builder->orWhereHas(
                        'user',
                        fn ($query) =>
                        $query
                            ->where('name', 'like', '%' . $term . '%')
                    ))
                ->sortable(),
            Column::make('Account Type', 'user.account_type')
                ->searchable(fn ($builder, $term) =>
                    $builder->orWhereHas(
                        'user',
                        fn ($query) =>
                        $query
                            ->where('account_type', 'like', '%' . $term . '%')
                    )),
            Column::make('State', 'user.state')
                ->searchable(fn ($builder, $term) =>
                    $builder->orWhereHas(
                        'user',
                        fn ($query) =>
                        $query
                            ->where('state', 'like', '%' . $term . '%')
                    )),
            Column::make('State Code', 'user.state_code')
                ->searchable(fn ($builder, $term) =>
                    $builder->orWhereHas(
                        'user',
                        fn ($query) =>
                        $query
                            ->where('state_code', 'like', '%' . $term . '%')
                    )),
            Column::make('Batch', 'batch.name')
                ->searchable(fn ($builder, $term) =>
                    $builder->orWhereHas(
                        'batch',
                        fn ($query) =>
                        $query
                            ->where('name', 'like', '%' . $term . '%')
                    ))
        ];
    }

    public function getTableRowUrl($row): string
    {
        return route('students.show', $row);
    }


    public function filters(): array
    {
        return [
            'batch' => Filter::make('Batch')
                ->select(
                    array_merge(
                        [
                            '' => 'Any'
                            ],
                        $this->course->batches()->get()->pluck("name", 'id')->toArray()
                    )
                )
        ];
    }
}
