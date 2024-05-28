<?php
namespace App\UseCase\Contact;

use Illuminate\Http\Request;
use App\Models\Contact;

class CreateContactUseCase
{
    public function __invoke(Request $request)
    {
        $contactData = $request->session()->get('contact_data');
        Contact::create([
            'user_id' => auth()->id(),
            'title' => $contactData['title'],
            'contents' => $contactData['contents']
        ]);
        $request->session()->forget('contact_data');
    }
}
