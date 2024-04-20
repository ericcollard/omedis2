<?php

namespace App\Livewire;

use Livewire\Component;

class Partners extends Component
{
    public function render()
    {
        $list = [
            'afs',
            'chinook',
            'dynafiber',
            'eleveight',
            'fone',
            'freeride',
            'glissattitude',
            'glissevolution',
            'nausicaa',
            'picture',
            'surfone',
        ];
        return view('livewire.partners',compact('list'));
    }
}
