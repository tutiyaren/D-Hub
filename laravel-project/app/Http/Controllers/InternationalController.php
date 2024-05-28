<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCase\Services\UserService;
use App\UseCase\Debate\GetDebateUseCase;
use App\UseCase\Debate\CreateCommentUseCase;
use App\UseCase\Debate\GetMarkDebateUseCase;
use App\UseCase\Debate\ShowDebateUseCase;
use App\Http\Requests\CommentRequest;
use App\Models\Anonymity;
use App\Models\Genre;

class InternationalController extends Controller
{
    protected $userService;
    protected $getDebateUseCase;
    protected $getMarkDebateUseCase;

    public function __construct(UserService $userService, GetDebateUseCase $getDebateUseCase, GetMarkDebateUseCase $getMarkDebateUseCase)
    {
        $this->userService = $userService;
        $this->getDebateUseCase = $getDebateUseCase;
        $this->getMarkDebateUseCase = $getMarkDebateUseCase;
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $debates = $this->getDebateUseCase->execute(3, $keyword);
        $genre = Genre::find(3);
        $anonymity = $this->userService->checkAnonymity();
        $marks = $this->getMarkDebateUseCase->execute($debates, $anonymity);
        list('isBookmarked' => $isBookmarked, 'isVote' => $isVote) = $marks;

        return view('international.index', compact('debates', 'genre', 'isBookmarked', 'isVote', 'anonymity'));
    }

    public function show($id, ShowDebateUseCase $showDebateUseCase)
    {
        $genre = Genre::find(3);
        $anonymity = $this->userService->checkAnonymity();
        $debateData = $showDebateUseCase($id);
        $debate = $debateData['debate'];
        $comments = $debateData['comments'];
        return view('international.show', compact('debate', 'genre', 'comments', 'anonymity'));
    }

    public function store(CommentRequest $request, $id, CreateCommentUseCase $case)
    {
        $anonymity = $this->userService->checkAnonymity();
        $redirectResponse = $this->userService->isCheckAnonymity($anonymity);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        $case($request, $anonymity->id, $id);
        return redirect()->route('international.show', ['id' => $id]);
    }

    public function bookmark($id)
    {
        $this->userService->handleBookmark($id);
        return redirect()->route('international.index');
    }

    public function vote(Request $request)
    {
        $voteType = $request->input('vote_type');
        $debateId = $request->input('debate_id');

        $this->userService->handleVote($debateId, $voteType);
        return redirect()->route('international.index');
    }
}
