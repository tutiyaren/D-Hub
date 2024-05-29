<?php
namespace App\UseCase\Contact;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactTel;

class CreateContactUseCase
{
    public function __invoke(Request $request)
    {
        $contactData = $request->session()->get('contact_data');
        $contact = Contact::create([
            'user_id' => auth()->id(),
            'title' => $contactData['title'],
            'contents' => $contactData['contents']
        ]);
        ContactTel::create([
            'contact_id' => $contact->id,
            'tel' => $contactData['tel']
        ]);
        $request->session()->forget('contact_data');
    }
}
