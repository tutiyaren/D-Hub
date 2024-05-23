<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debate;
use App\Models\Genre;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\Anonymity;
use App\Models\Favorite_Debate;

class EconomyController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $debates = Debate::where('genre_id', 2)->titleSearch($keyword)->orderBy('created_at', 'desc')->paginate(5);
        }
        if (!$keyword) {
            $debates = Debate::where('genre_id', 2)->orderBy('created_at', 'desc')->paginate(5);
        }
        $genre = Genre::find(2);
        $userId = auth()->user()->id;
        $anonymity = Anonymity::where('user_id', $userId)->first();
        $isBookmarked = [];
        foreach ($debates as $debate) {
            $exists = Favorite_Debate::where('anonymity_id', $anonymity->id)->where('debate_id', $debate->id)->exists();
            $isBookmarked[$debate->id] = $exists;
        }
        return view('economy.index', compact('debates','genre', 'isBookmarked'));
    }

    public function show($id)
    {
        $debate = Debate::find($id);
        $genre = Genre::find(2);
        $comments = Comment::where('debate_id', $id)->orderBy('created_at', 'desc')->get();
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

    public function bookmark($id)
    {
        $userId = auth()->user()->id;
        $anonymity = Anonymity::where('user_id', $userId)->first();
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
        $favoriteDebate = Favorite_Debate::where('anonymity_id', $anonymity->id)->where('debate_id', $id)->first();
        if ($favoriteDebate) {
            $favoriteDebate->delete();
        }
        if (!$favoriteDebate) {
            Favorite_Debate::create([
                'anonymity_id' => $anonymity->id,
                'debate_id' => $id,
            ]);
        }
        return redirect()->route('economy.index');
    }
}
