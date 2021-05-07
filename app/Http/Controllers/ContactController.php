<?php

namespace App\Http\Controllers;
use Mail;

use Illuminate\Http\Request;

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
            'message' => ['required', 'min:20'],
        ]);

        $data['name'] = $request->get('name');
        $data['email'] = $request->get('email');
        $data['subject'] = $request->get('subject');
        $data['message'] = $request->get('message');

        try {
            Mail::send([], [], function($message) use($data) {
                $message->to('kieran@aylo.net');
                $message->replyTo($data['email']);
                $message->cc($data['email']);
                $message->subject($data['subject']);
                $message->setBody("AUTOMATED EMAIL FROM CONTACT FORM\r\n\r\n" . $data['message'] . "\r\n\r\nFrom ". $data['name']);
            });
            
            return back()->with('success', 'Successfully sent email 😄');
        } catch (\Exception $e) {
            return back()->with('failure', 'Could not send email, try again later 😥');   
        }

    }
}
