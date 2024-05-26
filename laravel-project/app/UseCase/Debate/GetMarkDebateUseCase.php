<?php
namespace App\UseCase\Debate;

use App\Models\Favorite_Debate;
use App\Models\Vote;

class GetMarkDebateUseCase
{
    public function execute($debates, $anonymity)
    {
        $isBookmarked = [];
        $isVote = [];

        foreach ($debates as $debate) {
            if (!$anonymity) {
                return ['isBookmarked' => $isBookmarked, 'isVote' => $isVote];
            }

            $existsBookmark = Favorite_Debate::where('anonymity_id', $anonymity->id)->where('debate_id', $debate->id)->exists();
            $isBookmarked[$debate->id] = $existsBookmark;

            $vote = Vote::where('anonymity_id', $anonymity->id)->where('debate_id', $debate->id)->first();
            $isVote[$debate->id] = $vote ? $vote->vote_type : null;
        }

        return ['isBookmarked' => $isBookmarked, 'isVote' => $isVote];
    }
}
