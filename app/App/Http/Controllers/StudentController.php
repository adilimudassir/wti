<?php

namespace App\Http\Controllers;

use Domains\Student\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentFormRequest;
use Domains\Auth\Repositories\RoleRepository;
use Domains\Student\Repositories\StudentRepository;

class StudentController extends Controller
{
    /**
     * create an instance of the controller.
     *
     * @param StudentRepository $studentRepository
     */
    public function __construct(private StudentRepository $studentRepository)
    {}

    public function index()
    {
        $this->authorize('read-students');

        return view('students.index', [
            //
        ]);
    }

    public function create()
    {
        $this->authorize('create-students');

        return view('students.create', [
            'account_types' => Student::$types,
            'states' => Student::$states,
        ]);
    }

    public function store(StudentFormRequest $request)
    {
        $this->authorize('created-students');

        $this->studentRepository->create($request);

        return redirect()
            ->route('students.index')
            ->withFlashSuccess('Student Added Successfully!');
    }

    public function show($id)
    {
        $this->authorize('read-students');

        return view('students.overview', [
            'student' => $this->studentRepository->getById($id),
        ]);
    }

    public function edit($id, RoleRepository $roleRepository)
    {
        $this->authorize('update-students');

        return view('students.edit', [
            'student' => $this->studentRepository->getById($id),
            'account_types' => Student::$types,
            'states' => Student::$states,
        ]);
    }

    public function update(StudentFormRequest $request, $id)
    {
        $this->authorize('update-students');

        $this->studentRepository->update(
            $request,
            $this->studentRepository->getById($id)
        );

        return redirect()
            ->route('students.index')
            ->withFlashSuccess('Student Updated Successfully!');
    }

    public function destroy($id)
    {
        $this->authorize('delete-students');

        $this->studentRepository->deleteById($id);

        return redirect()
            ->route('students.index')
            ->withFlashSuccess('Student Deleted Successfully!');
    }
}
