<?php
namespace App\UseCase\Services;

use App\Models\Anonymity;
use App\Models\Favorite_Debate;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function checkAnonymity()
    {
        $userId = Auth::id();
        return Anonymity::getByUserId($userId);
    }

    public function isCheckAnonymity($anonymity)
    {
        if (!$anonymity) {
            return redirect()->route('mypage.nickname')->with('error', 'ニックネームを設定してください');
        }
    }

    public function handleBookmark($debateId)
    {
        $anonymity = $this->checkAnonymity();
        $this->isCheckAnonymity($anonymity);

        $favoriteDebate = Favorite_Debate::where('anonymity_id', $anonymity->id)->where('debate_id', $debateId)->first();

        if ($favoriteDebate) {
            $favoriteDebate->delete();
        }
        if (!$favoriteDebate) {
            Favorite_Debate::create([
                'anonymity_id' => $anonymity->id,
                'debate_id' => $debateId,
            ]);
        }
    }

    public function handleVote($debateId, $voteType)
    {
        $anonymity = $this->checkAnonymity();
        $this->isCheckAnonymity($anonymity);

        $existingVote = Vote::where('anonymity_id', $anonymity->id)->where('debate_id', $debateId)->first();

        if (!empty($existingVote) && $existingVote->vote_type === $voteType) {
            $existingVote->delete();
            return redirect()->route('economy.index');
        }

        if ($existingVote) {
            $existingVote->delete();
        }

        Vote::create([
            'anonymity_id' => $anonymity->id,
            'debate_id' => $debateId,
            'vote_type' => $voteType,
        ]);
    }
}
