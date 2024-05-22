<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnonymityRequest;
use App\Models\Anonymity;
use App\Models\Debate;

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

    public function post(Request $request)
    {
        $userId = auth()->user()->id;
        $anonymity = Anonymity::where('user_id', $userId)->first();
        $keyword = $request->input('keyword');
        if ($keyword) {
            $myDebates = Debate::where('anonymity_id', $anonymity->id)->titleSearch($keyword)->paginate(5);
        }
        if (!$keyword) {
            $myDebates = Debate::where('anonymity_id', $anonymity->id)->paginate(5);
        }
        return view('mypage.post', compact('myDebates'));
    }

    public function destory(Request $request, $id)
    {
        $debate = Debate::find($id);
        $debate->delete();
        return redirect()->route('mypage.post');
    }
}
