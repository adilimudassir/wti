<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordFormRequest;
use Domains\Student\Repositories\StudentRepository;

class StudentPasswordController
{

    /**
     * create an instance of the controller.
     *
     * @param StudentRepository $studentRepository
     */
    public function __construct(private StudentRepository $studentRepository)
    {
    }

    public function edit($id)
    {
        return view('students.change-password', [
            'student' => $this->studentRepository->getById($id),
        ]);
    }

    public function update(UserPasswordFormRequest $request, $id = null)
    {
        $this->studentRepository->updatePassword(
            $this->studentRepository->getById($id),
            $request->all()
        );
        return redirect()->route('students.index')->withFlashSuccess('Password Updated');
    }
}
