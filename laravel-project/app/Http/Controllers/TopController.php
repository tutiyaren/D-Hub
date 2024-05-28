<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        return view('index.top');
    }

    public function create()
    {
        return view('index.create');
    }
}
