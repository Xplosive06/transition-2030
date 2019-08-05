<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function create()
    {
       return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
        $mailable = new ContactMessageCreated($request->name, $request->email, $request->message);

        Mail::to(config('transition2030.admin_support_email'))->send($mailable);

        flashy('Nous vous recontacterons dans les plus brefs délais!');

        return redirect()->route('root_path');
    }
}
