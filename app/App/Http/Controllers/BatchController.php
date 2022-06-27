<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domains\Course\Models\Batch;

class BatchController extends Controller
{
    /**
     * create an instance of BatchController
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $batch = Batch::findOrFail($id);
        return view('batches.show', [
            'batch' => $batch,
        ]);
    }

    public function update(Request $request, $id)
    {
        Batch::findOrFail($id)->update($request->all());

        alert()->success('Batch Updated')->toToast();

        return back();
    }

    public function sendAdmissionLetter($id)
    {
        $batch = Batch::findOrFail($id);

        $batch->userCourses->each(fn ($userCourse) => $userCourse->sendAdmissionLetter());

        notify()->success('Admission letter sent successfully');

        return back();
    }
}
