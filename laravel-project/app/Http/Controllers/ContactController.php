<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    public function confirmation()
    {
        return view('contact.confirmation');
    }

    public function thank()
    {
        return view('contact.thank');
    }
}
