<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    /**
     * Show the application landing page.
     *
     * @return Response
     */
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }
}
