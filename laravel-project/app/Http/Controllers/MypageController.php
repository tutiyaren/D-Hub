<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        return view('mypage.index');
    }

    public function nickname()
    {
        return view('mypage.nickname');
    }

    public function bookmark()
    {
        return view('mypage.bookmark');
    }

    public function post()
    {
        return view('mypage.post');
    }
}
