<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DebateRequest;
use App\Models\Genre;
use App\Models\Anonymity;
use App\Models\Debate;

class TopController extends Controller
{
    public function index()
    {
        return view('index.top');
    }

    // 議題作成ページ
    public function create()
    {
        $genres = Genre::get();
        return view('index.create', compact('genres'));
    }

    // 議題作成処理
    public function store(DebateRequest $request)
    {
        $userId = auth()->user()->id;
        $anonymity = Anonymity::getByUserId($userId);
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
        $genreId = $request->input('genre_id');
        $title = $request->input('title');
        $contents = $request->input('contents');
        Debate::create([
            'anonymity_id' => $anonymity->id,
            'genre_id' => $genreId,
            'title' => $title,
            'contents' => $contents,
        ]);
        return redirect()->route('index.index');
    }
}
