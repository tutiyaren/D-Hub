<?php
namespace App\UseCase\Mypage;

use App\Models\Favorite_Debate;

class DeleteBookmarkUseCase
{
    public function __invoke($anonymity, $debateId)
    {
        $favoriteDebate = Favorite_Debate::where('anonymity_id', $anonymity->id)->where('debate_id', $debateId)->first();
        $favoriteDebate->delete();
    }
}
