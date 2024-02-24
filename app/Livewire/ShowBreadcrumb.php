<?php

namespace App\Livewire;

use Livewire\Component;

class ShowBreadcrumb extends Component
{
    public $items;

    public function render()
    {
        return view('livewire.show-breadcrumb');
    }
}
