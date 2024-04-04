<?php

namespace App\Livewire;

use App\Events\TriggerEvent;
use Livewire\Component;

class Sender extends Component
{
    public $message;



    public function trigger()
    {
        TriggerEvent::dispatch($this->message);
    }

    public function render()
    {
        return view('livewire.sender');
    }
}
