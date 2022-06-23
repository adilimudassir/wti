<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    /**
     * create an instance of the controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('profile.overview', [
            'user' => auth()->user()
        ]);
    }

    public function changePassword()
    {
        return view('profile.change-password');
    }
}
