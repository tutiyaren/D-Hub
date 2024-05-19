<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnonymityRequest;
use App\Models\Anonymity;

class MypageController extends Controller
{
    public function index()
    {
        return view('mypage.index');
    }

    // ニックネーム設定ページ
    public function nickname()
    {
        $userId = auth()->user()->id;
        $anonymity = Anonymity::where('user_id', $userId)->first();
        return view('mypage.nickname', compact('anonymity'));
    }
    
    // ニックネーム追加・編集
    public function store(AnonymityRequest $request)
    {
        $userId = auth()->user()->id;
        $nickname = $request->input('nickname');
        $anonymity = Anonymity::where('user_id', $userId)->first();
        if ($anonymity) {
            $anonymity->update(['nickname' => $nickname]);
            return redirect()->route('mypage.index');
        }
        Anonymity::create([
            'user_id' => $userId,
            'nickname' => $nickname
        ]);
        return redirect()->route('index.index');
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
