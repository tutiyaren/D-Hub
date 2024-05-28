<?php
namespace App\UseCase\Mypage;

use App\Models\Debate;

class GetMyDebateUseCase
{
    public function __invoke($anonymity, $keyword)
    {
        $myDebatesQuery = Debate::where('anonymity_id', $anonymity->id);

        if ($keyword) {
            $myDebatesQuery->titleSearch($keyword);
        }

        return $myDebatesQuery->orderBy('created_at', 'desc')->paginate(5);
    }
}
