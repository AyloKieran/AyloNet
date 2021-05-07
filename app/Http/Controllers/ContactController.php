<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function contact(Request $request) {
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'min:5'],
            'message' => ['required', 'min:10'],
        ]);

        $name = $request->get('name');
        $email = $request->get('email');
        $subject = $request->get('subject');
        $message = $request->get('message');

        try {
            Mail::to('kieran@aylo.net')
                ->queue(new ContactMail($subject, $name, $message, $email));

            return back()->with('success', 'Successfully sent email 😄');
        } catch (\Exception $e) {
            return back()->with('failure', 'Could not send email, try again later 😥');   
        }

    }
}
