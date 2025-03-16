<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function rendFormulaire()
    {
        return view("view_formulaire_contact");
    }

    public function valideEtTraiteFormulaire(ContactRequest $request)
    {
        Mail::send(
            'template_mail',
            $request->all(),
            function ($message) {
                $message->to('admin@example.com')
                    ->subject('Nouveau message via formulaire de contact');
            }
        );
        return view('view_confirmation');
    }
}
