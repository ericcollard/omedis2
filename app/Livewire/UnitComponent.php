<?php

namespace App\Livewire;

use App\Models\Unit;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class UnitComponent extends Component
{

    public $showingModal = false;
    public $modalTitle = "";
    public $currentUrl;

    public $listeners = [
        'hideMe' => 'hideModal'
    ];

    /* List of attributes for validation */
    public $id;

    #[Validate('min:1', message: 'This field is too short')]
    #[Validate('lowercase', message: 'This field should be lowercase')]
    #[Validate('string', message: 'This field should be a string')]
    #[Validate('required', message: 'This field  is required')]
    public $name;

    public $comment;

    public $unitId;

    public function mount($unitId = null)
    {
        $this->unitId = $unitId;
    }

    public function store()
    {
        log::debug('store');
        $this->validate();
        log::debug('validated');

        $data = [
            'name' => $this->name,
            'comment' => $this->comment,
        ];

        if ($this->id)
        {
            $unit = Unit::findOrFail($this->id);
            $this->authorize('update', $unit);
            $unit->update($data);
            session()->flash('flash.banner', 'Unit updated!');
        }
        else
        {
            $this->authorize('create', Unit::class);
            Unit::create($data);
            session()->flash('flash.banner', 'Unit created!');
        }


        $this->hideModal();
        $this->reset();
        session()->flash('flash.bannerStyle', 'success');

        $this->redirectRoute('units');

    }

    public function render()
    {
        return view('livewire.unit-component');
    }

    #[On('create-item')]
    public function onCreateFired()
    {
        log::debug('Create fired ');
        $this->modalTitle = "Create unit";
        $this->required = false;
        $this->showModal();
    }

    #[On('edit-item')]
    public function onEditFired($id)
    {
        $this->modalTitle = "Edit unit";
        $unit = Unit::findOrFail($id);

        $this->id = $unit->id;
        $this->name = $unit->name;
        $this->comment = $unit->comment;


        $this->showModal();
    }

    #[On('duplicate-item')]
    public function onDuplicateFired($id)
    {
        $this->modalTitle = "Duplicate unit";
        $unit1 = Unit::findOrFail($id);

        $this->authorize('create', Unit::class);

        $unit = $unit1->replicate()->fill([
            'name' => $unit1->name." Copy"
        ]);

        $this->id = $unit->id;
        $this->name = $unit->name;
        $this->comment = $unit->comment;

        $this->showModal();

    }

    #[On('delete-item')]
    public function onDeleteFired($id)
    {
        $unit = Unit::findOrFail($id);
        $this->authorize('delete', $unit);
        $unit->delete();
        $request = request();
        $request->session()->flash('flash.banner', 'Unit deleted!');
        $request->session()->flash('flash.bannerStyle', 'success');
        $this->redirectRoute('units');

    }

    public function showModal(){
        $this->showingModal = true;
        $this->resetValidation();
    }

    public function hideModal(){
        $this->showingModal = false;
    }

    #[On('import-items')]
    public function onImportFired()
    {
        log::debug('onImportFired'.$this->currentUrl);
        $return = str_replace('/','+',$this->currentUrl);
        $this->redirectRoute('upload_valuelist',[
            'table_name' => 'units',
            'incoming_url' => $return
        ]);
    }

}
