<?php
namespace App\UseCase\CreateDebate;

use App\Models\Anonymity;
use App\Models\Debate;
use Illuminate\Http\Request;

class CreateDebateUseCase
{
    public function __invoke(Request $request)
    {
        $userId = auth()->id();
        $anonymity = Anonymity::getByUserId($userId);
        $genreId = $request->input('genre_id');
        $title = $request->input('title');
        $contents = $request->input('contents');
        Debate::create([
            'anonymity_id' => $anonymity->id,
            'genre_id' => $genreId,
            'title' => $title,
            'contents' => $contents,
        ]);
    }
}
