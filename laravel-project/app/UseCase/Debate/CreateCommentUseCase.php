<?php
namespace App\UseCase\Debate;

use App\Models\Comment;
use Illuminate\Http\Request;

class CreateCommentUseCase
{
    public function __invoke(Request $request, $anonymityId, $debateId)
    {
        $contents = $request->input('contents');
        Comment::create([
            'anonymity_id' => $anonymityId,
            'debate_id' => $debateId,
            'contents' => $contents
        ]);
    }
}
