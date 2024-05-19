<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternationalController extends Controller
{
    public function index()
    {
        return view('international.index');
    }

    public function show()
    {
        return view('international.show');
    }
}
