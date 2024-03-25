<?php

namespace App\Livewire;

use Livewire\Component;

class Receiver extends Component
{
    protected $listeners = ['echo:public-events,TriggerEvent' => 'responseToEvent'];

    public $message;

    public function render()
    {
        return view('livewire.receiver');
    }

    public function responseToEvent($event)
    {
        $this->message = $event['message'];
    }
}
