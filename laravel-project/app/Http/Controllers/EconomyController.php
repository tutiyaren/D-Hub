<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debate;
use App\Models\Genre;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\Anonymity;

class EconomyController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $debates = Debate::where('genre_id', 2)->titleSearch($keyword)->paginate(5);
        }
        if (!$keyword) {
            $debates = Debate::where('genre_id', 2)->paginate(5);
        }
        $genre = Genre::find(2);
        return view('economy.index', compact('debates', 'genre'));
    }

    public function show($id)
    {
        $debate = Debate::find($id);
        $genre = Genre::find(2);
        $comments = Comment::where('debate_id', $id)->get();
        return view('economy.show', compact('debate', 'genre', 'comments'));
    }

    public function store(CommentRequest $request, $id)
    {
        $userId = auth()->user()->id;
        $anonymity = Anonymity::where('user_id', $userId)->first();
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }

        $contents = $request->input('contents');
        Comment::create([
            'anonymity_id' => $anonymity->id,
            'debate_id' => $id,
            'contents' => $contents,
        ]);

        return redirect()->route('economy.show', ['id' => $id]);
    }
}
