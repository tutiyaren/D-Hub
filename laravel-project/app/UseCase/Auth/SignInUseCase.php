<?php
namespace App\UseCase\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anonymity;

class SignInUseCase
{
    public function __invoke(Request $request)
    {
        try {
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                throw new \Exception('メールアドレスまたはパスワードが間違っています。');
            }

            $userId = Auth::id();
            $anonymity = Anonymity::where('user_id', $userId)->first();

            return [
                'success' => true,
                'redirect_route' => ($anonymity && $anonymity->nickname) ? 'index.index' : 'mypage.nickname',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error_message' => $e->getMessage(),
            ];
        }
    }
}
