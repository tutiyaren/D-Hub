<?php
namespace App\UseCase\Debate;

use App\Models\Debate;
use App\Models\Comment;

class ShowDebateUseCase
{
    public function __invoke($id)
    {
        $debate = Debate::find($id);
        $comments = Comment::where('debate_id', $id)->orderBy('created_at', 'desc')->get();

        return ['debate' => $debate, 'comments' => $comments];
    }
}
