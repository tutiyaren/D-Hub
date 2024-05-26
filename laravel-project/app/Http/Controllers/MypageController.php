<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnonymityRequest;
use App\UseCase\Services\UserService;
use App\Models\Anonymity;
use App\UseCase\Mypage\CreateNicknameUseCase;
use App\UseCase\Mypage\DeleteBookmarkUseCase;
use App\UseCase\Mypage\DeleteDebateUseCase;
use App\UseCase\Mypage\GetBookmarkUseCase;
use App\UseCase\Mypage\GetMyDebateUseCase;

class MypageController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('mypage.index');
    }

    // ニックネーム設定ページ
    public function nickname()
    {
        $anonymity = $this->userService->checkAnonymity();
        return view('mypage.nickname', compact('anonymity'));
    }
    
    // ニックネーム追加・編集
    public function store(AnonymityRequest $request, CreateNicknameUseCase $case)
    {
        $userId = auth()->user()->id;
        $nickname = $request->input('nickname');
        $anonymity = $this->userService->checkAnonymity();
        if ($anonymity) {
            $anonymity->update(['nickname' => $nickname]);
            return redirect()->route('mypage.index')->with('error', 'ニックネームを設定してください');
        }
        $case($userId, $nickname);
        return redirect()->route('index.index');
    }

    public function bookmark(Request $request, GetBookmarkUseCase $case)
    {
        $userId = auth()->id();
        $anonymity = Anonymity::getByUserId($userId);
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
        $anonymity = $this->userService->checkAnonymity();
        $this->userService->isCheckAnonymity($anonymity);
        $keyword = $request->input('keyword');
        list('bookmarkDebates' => $bookmarkDebates, 'isVote' => $isVote) = $case($anonymity, $keyword);
        return view('mypage.bookmark', compact('bookmarkDebates', 'isVote'));
    }

    public function bookmarkToggle(Request $request, DeleteBookmarkUseCase $case)
    {
        $debateId = $request->input('debate_id');
        $anonymity = $this->userService->checkAnonymity();
        $this->userService->isCheckAnonymity($anonymity);
        $case($anonymity, $debateId);
        return redirect()->route('mypage.bookmark');
    }

    public function vote(Request $request)
    {
        $anonymity = $this->userService->checkAnonymity();
        $this->userService->isCheckAnonymity($anonymity);

        $voteType = $request->input('vote_type');
        $debateId = $request->input('debate_id');
        $this->userService->handleVote($debateId, $voteType);

        return redirect()->route('mypage.bookmark');
    }

    public function post(Request $request, GetMyDebateUseCase $case)
    {
        $userId = auth()->id();
        $anonymity = Anonymity::getByUserId($userId);
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
        $anonymity = $this->userService->checkAnonymity();
        $this->userService->isCheckAnonymity($anonymity);
        $keyword = $request->input('keyword');
        $myDebates = $case($anonymity, $keyword);
        return view('mypage.post', compact('myDebates'));
    }

    public function destory($id, DeleteDebateUseCase $case)
    {
        $case($id);
        return redirect()->route('mypage.post');
    }
}
