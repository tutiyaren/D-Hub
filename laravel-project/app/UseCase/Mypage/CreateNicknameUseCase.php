<?php
namespace App\UseCase\Mypage;

use App\Models\Anonymity;

class CreateNicknameUseCase
{
    public function __invoke($userId, $nickname)
    {
        return Anonymity::create([
            'user_id' => $userId,
            'nickname' => $nickname
        ]);
    }
}
