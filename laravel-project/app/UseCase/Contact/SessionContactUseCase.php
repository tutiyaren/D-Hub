<?php
namespace App\UseCase\Contact;

use Illuminate\Http\Request;

class SessionContactUseCase
{
    public function __invoke(Request $request)
    {
        return $request->session()->put('contact_data', $request->all());
    }
}
