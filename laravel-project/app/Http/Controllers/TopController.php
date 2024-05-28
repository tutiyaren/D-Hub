<?php
namespace App\Http\Controllers;

use App\Http\Requests\DebateRequest;
use App\UseCase\CreateDebate\CreateDebateUseCase;
use App\UseCase\CreateDebate\GetGenreUseCase;
use App\UseCase\Services\UserService;

class TopController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function index()
    {
        return view('index.top');
    }

    // 議題作成ページ
    public function create(GetGenreUseCase $case)
    {
        $genres = $case();
        return view('index.create', compact('genres'));
    }

    // 議題作成処理
    public function store(DebateRequest $request, CreateDebateUseCase $case)
    {
        $anonymity = $this->userService->checkAnonymity();
        $redirectResponse = $this->userService->isCheckAnonymity($anonymity);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        $case($request);
        return redirect()->route('index.index');
    }
}
