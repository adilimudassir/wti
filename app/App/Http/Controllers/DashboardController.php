<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
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

    public function __invoke()
    {
        return view('dashboard');
    }
}
