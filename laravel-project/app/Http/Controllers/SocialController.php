<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        return view('social.index');
    }

    public function show()
    {
        return view('social.show');
    }
}
