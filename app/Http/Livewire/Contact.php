<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use App\Models\SentContactFormEmails;
use Carbon\Carbon;

class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    public $valid = ['name' => false, 'email' => false, 'subject' => false, 'message' => false];
    public $canSubmit = false;

    protected $rules = [
        'name' => ['required', 'min:5'],
        'email' => ['required', 'email'],
        'subject' => ['required', 'min:10'],
        'message' => ['required', 'min:20'],
    ];

    public function updated($propertyName)
    {
        $this->canSubmit = false;

        $this->valid[$propertyName] = false;
        $this->validateOnly($propertyName);

        $this->valid[$propertyName] = true;

        $this->can_submit = true;
        foreach($this->valid as $property) {
            if(!$property) {
                $this->can_submit = false;
                break;
            }
        }
    }

    public function submit()
    {
        $this->validate($this->rules);

        $date = Carbon::now();
        $date->modify('-10 minutes')->format('Y-m-d H:i:s');
        SentContactFormEmails::where('updated_at', '<=', $date)->delete();

        $sentMail = SentContactFormEmails::where('email', $this->email)->first();

        if($sentMail == null) {
            try {
                Mail::to('kieran@aylo.net')
                    ->queue(new ContactMail($this->subject, $this->name, $this->message, $this->email));
    
                SentContactFormEmails::firstOrCreate(['email' => $this->email]);
    
                return back()->with('success', 'Successfully sent email 😄');
            } catch (\Exception $e) {
                return back()->with('failure', 'Could not send email, try again later 😥');   
            }
        } else {
            return back()->with('failure', 'You have recently contacted this form. Please respond to the email that was sent to you 😊'); 
        }
    }

    public function render()
    {
        return view('livewire.contact', ['canSubmit' => $this->canSubmit]);
    }
}
