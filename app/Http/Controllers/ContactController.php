<?php

namespace App\Http\Controllers;

use App\Mail\VisitorContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function send_mail(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'sujet'=>'required',
            'message' => 'required'
        ]);

       Contact::create($request->all());
       $email = ['aegisi00224@gmail.com', 'abdoulhamid422@gmail.com'];
       Mail::to($email)->send(new VisitorContact($request));
    }
    public function findAll(){
        $contact = Contact::all();
        return $contact;
    }
}
