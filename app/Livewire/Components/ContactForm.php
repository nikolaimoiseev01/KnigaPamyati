<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;
    public function render()
    {
        return view('livewire.components.contact-form');
    }

    public function send() {
        dd('SENT!', $this->name, $this->email, $this->message);
    }
}
