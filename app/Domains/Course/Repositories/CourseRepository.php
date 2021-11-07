<?php

namespace Domains\Course\Repositories;

use Domains\Course\Models\Course;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Http\Requests\CourseFormRequest;
use Domains\General\Exceptions\GeneralException;

class CourseRepository extends BaseRepository
{
    /**
     * create instance of the class.
     *
     * @param Course $course
     */
    public function __construct(Course $course)
    {
        $this->model = $course;
    }

    public function create(CourseFormRequest $request): Course
    {
        return DB::transaction(function () use ($request) {
            $newCourse = $this->model::create($this->fields($request->all()));

            if (!$newCourse) {
                throw new GeneralException('Course could not be created at the moment');
            }
            
            return $newCourse;
        });
    }

    public function update(CourseFormRequest $request, Course $course): Course
    {
        return DB::transaction(function () use ($request, $course) {
            if (!$course->update($this->fields($request->all()))) {
                throw new GeneralException('Course Could not be updated');
            }

            return $course;
        });
    }
}
