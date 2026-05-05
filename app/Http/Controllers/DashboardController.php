<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('login')) {
            return redirect('/login');
        }

        return view('dashboard');
    }
}
