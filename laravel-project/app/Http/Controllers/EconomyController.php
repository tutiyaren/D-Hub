<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EconomyController extends Controller
{
    public function index()
    {
        return view('economy.index');
    }

    public function show()
    {
        return view('economy.show');
    }
}
