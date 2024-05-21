<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Debate;
use App\Models\Anonymity;
use App\Models\Genre;
use App\Models\Comment;

class PoliticsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $debates = Debate::where('genre_id', 1)->titleSearch($keyword)->paginate(5);
        }
        if (!$keyword) {
            $debates = Debate::where('genre_id', 1)->paginate(5);
        }
        $genre = Genre::find(1);
        return view('politics.index', compact('debates', 'genre'));
    }

    public function show($id)
    {
        $debate = Debate::find($id);
        $genre = Genre::find(1);
        $comments = Comment::where('debate_id', $id)->get();
        return view('politics.show', compact('debate', 'genre', 'comments'));
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

        return redirect()->route('politics.show', ['id' => $id]);
    }
}
