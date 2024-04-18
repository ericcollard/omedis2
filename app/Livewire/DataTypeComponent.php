<?php

namespace App\Livewire;

use App\Models\DataType;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class DataTypeComponent extends Component
{

    public $showingModal = false;
    public $modalTitle = "";
    public $currentUrl;
    public $datatypeId;

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

    public $validation_str;

    public $comment;

    public function mount($datatypeId = null)
    {
        $this->currentUrl = url()->current();
        $this->datatypeId = $datatypeId;
    }

    public function store()
    {
        log::debug('store');
        $this->validate();
        log::debug('validated');

        $data = [
            'name' => $this->name,
            'comment' => $this->comment,
            'validation_str' => $this->validation_str,
        ];

        if ($this->id)
        {
            $unit = DataType::findOrFail($this->id);
            $this->authorize('update', $unit);
            $unit->update($data);
            session()->flash('flash.banner', 'Data type updated!');
        }
        else
        {
            $this->authorize('create', DataType::class);
            DataType::create($data);
            session()->flash('flash.banner', 'Data Type created!');
        }


        $this->hideModal();
        $this->reset();
        session()->flash('flash.bannerStyle', 'success');

        $this->redirectRoute('datatypes');

    }

    public function render()
    {
        return view('livewire.datatype-component');
    }

    #[On('create-item')]
    public function onCreateFired()
    {
        log::debug('Create fired ');
        $this->modalTitle = "Create Data Type";
        $this->required = false;
        $this->showModal();
    }

    #[On('edit-item')]
    public function onEditFired($id)
    {
        $this->modalTitle = "Edit Data Type";
        $unit = DataType::findOrFail($id);

        $this->id = $unit->id;
        $this->name = $unit->name;
        $this->comment = $unit->comment;
        $this->validation_str = $unit->validation_str;

        $this->showModal();
    }

    #[On('duplicate-item')]
    public function onDuplicateFired($id)
    {
        $this->modalTitle = "Duplicate unit";
        $unit1 = DataType::findOrFail($id);

        $this->authorize('create', DataType::class);

        $unit = $unit1->replicate()->fill([
            'name' => $unit1->name." Copy"
        ]);

        $this->id = $unit->id;
        $this->name = $unit->name;
        $this->comment = $unit->comment;
        $this->validation_str = $unit->validation_str;
        $this->showModal();

    }

    #[On('delete-item')]
    public function onDeleteFired($id)
    {
        $unit = DataType::findOrFail($id);
        $this->authorize('delete', $unit);
        $unit->delete();
        $request = request();
        $request->session()->flash('flash.banner', 'Datatype deleted!');
        $request->session()->flash('flash.bannerStyle', 'success');
        $this->redirectRoute('datatypes');

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
            'table_name' => 'data_types',
            'incoming_url' => $return
        ]);
    }

}
