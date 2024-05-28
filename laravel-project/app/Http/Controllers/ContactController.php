<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\UseCase\Contact\GetContactUseCase;
use App\UseCase\Contact\SessionContactUseCase;
use App\UseCase\Contact\GetConfirmationUseCase;
use App\UseCase\Contact\CreateContactUseCase;

class ContactController extends Controller
{
    public function index(Request $request, GetContactUseCase $case)
    {
        $contactData = $case($request);
        return view('contact.contact', compact('contactData'));
    }

    public function confirmation(ContactRequest $request, SessionContactUseCase $case)
    {
        $case($request);
        return redirect()->route('contact.showConfirmation');
    }

    public function showConfirmation(Request $request, GetConfirmationUseCase $case)
    {
        $contactData = $case($request);
        if (!$contactData) {
            return redirect()->route('contact.contact');
        }
        return view('contact.confirmation', compact('contactData'));
    }

    public function complate(Request $request, CreateContactUseCase $case)
    {
        $case($request);
        return view('contact.thank');
    }
}
