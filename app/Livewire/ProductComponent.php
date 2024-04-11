<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductComponent extends Component
{
    #[On('select-all')]
    public function onSelectFired()
    {
        Product::selectAll();
        $this->dispatch('refreshDatatable');
    }

    #[On('deselect-all')]
    public function onDeselectFired()
    {
        Product::deselectAll();
        $this->dispatch('refreshDatatable');
    }


    public function render()
    {
        return view('livewire.product-component');

    }
}
