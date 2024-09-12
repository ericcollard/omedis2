<?php

namespace App\Livewire;

use Livewire\Component;

class ReceiverComponentIngest extends Component
{
    protected $listeners = ['echo:public-events,TriggerEvent' => 'responseToEvent'];

    public $message;

    public function render()
    {
        return view('livewire.receiver-component-ingest');
    }

    public function responseToEvent($event)
    {
        $this->message = $event['message'];
    }
}
