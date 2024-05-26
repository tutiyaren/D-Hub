<?php
namespace App\UseCase\Mypage;

use App\Models\Vote;
use App\Models\Favorite_Debate;

class GetBookmarkUseCase
{
    public function __invoke($anonymity, $keyword = null)
    {
        $bookmarkDebatesQuery = Favorite_Debate::where('anonymity_id', $anonymity->id);

        if ($keyword) {
            $bookmarkDebatesQuery->titleSearch($keyword);
        }

        $bookmarkDebates = $bookmarkDebatesQuery->orderBy('created_at', 'desc')->paginate(5);

        $isVote = [];
        foreach ($bookmarkDebates as $debate) {
            $debateId = $debate->debate_id;
            $vote = Vote::where('anonymity_id', $anonymity->id)->where('debate_id', $debateId)->first();
            $isVote[$debate->id] = $vote ? $vote->vote_type : null;
        }

        return ['bookmarkDebates' => $bookmarkDebates, 'isVote' => $isVote];
    }
}
