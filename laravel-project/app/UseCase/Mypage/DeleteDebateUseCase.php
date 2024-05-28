<?php
namespace App\UseCase\Mypage;

use App\Models\Debate;

class DeleteDebateUseCase
{
    public function __invoke($id)
    {
        $debate = Debate::find($id);
        $debate->delete();
    }
}
