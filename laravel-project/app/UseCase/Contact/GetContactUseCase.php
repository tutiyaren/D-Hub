<?php
namespace App\UseCase\Contact;

use Illuminate\Http\Request;

class GetContactUseCase
{
    public function __invoke(Request $request)
    {
        return $request->session()->get('contact_data', []);
    }
}
