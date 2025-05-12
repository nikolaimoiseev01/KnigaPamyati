<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $sent = False;
    public function render()
    {
        return view('livewire.components.contact-form');
    }

    public function send() {

        $email = 'tomas232@mail.ru';
        Mail::to($email)->send(new \App\Mail\ContactForm($this->name, $this->email, $this->message));
        $this->sent = True;
    }
}
