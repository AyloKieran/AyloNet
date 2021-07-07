<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use App\Models\SentContactFormEmails;
use Carbon\Carbon;

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
            'g-recaptcha-response' => ['required', 'recaptcha'],
        ]);

        $name = $request->get('name');
        $email = $request->get('email');
        $subject = $request->get('subject');
        $message = $request->get('message');

        $date = Carbon::now();
        $date->modify('-10 minutes')->format('Y-m-d H:i:s');
        SentContactFormEmails::where('updated_at', '<=', $date)->delete();

        $sentMail = SentContactFormEmails::where('email', $email)->first();

        if($sentMail == null) {
            try {
                Mail::to('kieran@aylo.net')
                    ->queue(new ContactMail($subject, $name, $message, $email));
    
                SentContactFormEmails::firstOrCreate(['email' => $email]);
    
                return back()->with('success', 'Successfully sent email 😄');
            } catch (\Exception $e) {
                return back()->with('failure', 'Could not send email, try again later 😥');   
            }
        } else {
            return back()->with('failure', 'You have recently contacted this form. Please respond to the email that was sent to you 😊'); 
        }
    }
}
