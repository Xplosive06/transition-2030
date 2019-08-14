<?php

namespace App\Http\Controllers;

use App\Models\Message;
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
        $message = Message::create($request->only('name', 'email', 'message'));

        Mail::to(config('transition2030.admin_support_email'))
            ->send(new ContactMessageCreated($message));

        flashy('Nous vous recontacterons dans les plus brefs délais!');

        return redirect()->home();
    }
}