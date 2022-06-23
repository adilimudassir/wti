<?php

namespace Domains\Student\Repositories;

use Domains\Auth\Models\User as Student;

class StudentRepository extends \Domains\Auth\Repositories\UserRepository
{
    /**
     * create an instance of the class.
     *
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }
}
