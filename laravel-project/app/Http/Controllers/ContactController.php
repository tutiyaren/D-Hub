<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contactData = $request->session()->get('contact_data', []);
        return view('contact.contact', compact('contactData'));
    }

    public function confirmation(ContactRequest $request)
    {
        $request->session()->put('contact_data', $request->all());
        return redirect()->route('contact.showConfirmation');
    }

    public function showConfirmation(Request $request)
    {
        $contactData = $request->session()->get('contact_data');
        if (!$contactData) {
            return redirect()->route('contact.contact');
        }
        return view('contact.confirmation', compact('contactData'));
    }

    public function complate(Request $request)
    {
        $contactData = $request->session()->get('contact_data');
        Contact::create([
            'user_id' => auth()->id(),
            'title' => $contactData['title'],
            'contents' => $contactData['contents']
        ]);
        $request->session()->forget('contact_data');
        return view('contact.thank');
    }
}
