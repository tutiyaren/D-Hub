<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnonymityRequest;
use App\Models\Anonymity;
use App\Models\Debate;
use App\Models\Favorite_Debate;
use App\Models\Vote;

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
        $anonymity = Anonymity::getByUserId($userId);
        return view('mypage.nickname', compact('anonymity'));
    }
    
    // ニックネーム追加・編集
    public function store(AnonymityRequest $request)
    {
        $userId = auth()->user()->id;
        $nickname = $request->input('nickname');
        $anonymity = Anonymity::getByUserId($userId);
        if ($anonymity) {
            $anonymity->update(['nickname' => $nickname]);
            return redirect()->route('mypage.index')->with('error', 'ニックネームを設定してください');
        }
        Anonymity::create([
            'user_id' => $userId,
            'nickname' => $nickname
        ]);
        return redirect()->route('index.index');
    }

    public function bookmark(Request $request)
    {
        $userId = auth()->user()->id;
        $anonymity = Anonymity::getByUserId($userId);
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
        $keyword = $request->input('keyword');
        if ($keyword) {
            $bookmarkDebates = Favorite_Debate::where('anonymity_id', $anonymity->id)->titleSearch($keyword)->orderBy('created_at', 'desc')->paginate(5);
        }
        if (!$keyword) {
            $bookmarkDebates = Favorite_Debate::where('anonymity_id', $anonymity->id)->orderBy('created_at', 'desc')->paginate(5);
        }
        $isVote = [];
        foreach ($bookmarkDebates as $debate) {
            $debateId = $debate->debate_id;
            $vote = Vote::where('anonymity_id', $anonymity->id)->where('debate_id', $debateId)->first();
            if (!$vote) {
                $isVote[$debate->id] = null;
            }
            if ($vote) {
                $isVote[$debate->id] = $vote->vote_type;
            }
        }
        return view('mypage.bookmark', compact('bookmarkDebates', 'isVote'));
    }

    public function bookmarkToggle(Request $request)
    {
        $debateId = $request->input('debate_id');
        $userId = auth()->user()->id;
        $anonymity = Anonymity::getByUserId($userId);
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
        $favoriteDebate = Favorite_Debate::where('anonymity_id', $anonymity->id)->where('debate_id', $debateId)->first();
        $favoriteDebate->delete();
        return redirect()->route('mypage.bookmark');
    }

    public function vote(Request $request)
    {
        $userId = auth()->user()->id;
        $anonymity = Anonymity::getByUserId($userId);
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
        $voteType = $request->input('vote_type');
        $debateId = $request->input('debate_id');

        $existingVote = Vote::where('anonymity_id', $anonymity->id)->where('debate_id', $debateId)->first();

        if (!empty($existingVote) && $existingVote->vote_type === $voteType) {
            $existingVote->delete();
            return redirect()->route('mypage.bookmark');
        }

        if ($existingVote) {
            $existingVote->delete();
        }
        Vote::create([
            'anonymity_id' => $anonymity->id,
            'debate_id' => $debateId,
            'vote_type' => $voteType,
        ]);

        return redirect()->route('mypage.bookmark');
    }

    public function post(Request $request)
    {
        $userId = auth()->user()->id;
        $anonymity = Anonymity::getByUserId($userId);
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
        $keyword = $request->input('keyword');
        if ($keyword) {
            $myDebates = Debate::where('anonymity_id', $anonymity->id)->titleSearch($keyword)->orderBy('created_at', 'desc')->paginate(5);
        }
        if (!$keyword) {
            $myDebates = Debate::where('anonymity_id', $anonymity->id)->orderBy('created_at', 'desc')->paginate(5);
        }
        return view('mypage.post', compact('myDebates'));
    }

    public function destory($id)
    {
        $debate = Debate::find($id);
        $debate->delete();
        return redirect()->route('mypage.post');
    }
}
