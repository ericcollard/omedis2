<?php

namespace App\Livewire;

use App\Models\AttributeList;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class AttributeListComponent extends Component
{

    public $showingModal = false;
    public $modalTitle = "";

    public $listeners = [
        'hideMe' => 'hideModal'
    ];

    /* List of attributes for validation */
    public $id;

    #[Validate('min:3', message: 'This field is too short')]
    #[Validate('lowercase', message: 'This field should be lowercase')]
    #[Validate('string', message: 'This field should be a string')]
    #[Validate('required', message: 'This field  is required')]
    public $name;

    public $comment;

    public $samples;

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'comment' => $this->comment,
        ];

        if ($this->id)
        {
            $attributeList = AttributeList::findOrFail($this->id);
            $this->authorize('update', $attributeList);
            $attributeList->update($data);
            session()->flash('flash.banner', 'AttributeList updated!');
        }
        else
        {
            $this->authorize('create', AttributeList::class);
            AttributeList::create($data);
            session()->flash('flash.banner', 'AttributeList created!');
        }


        $this->hideModal();
        $this->reset();
        session()->flash('flash.bannerStyle', 'success');

        $this->redirectRoute('attribute-lists');

    }

    public function render()
    {
        return view('livewire.attributelist-component');
    }

    #[On('create-item')]
    public function onCreateFired()
    {
        log::debug('Create fired ');
        $this->modalTitle = "Create attribute list";
        $this->name = "";
        $this->comment = "";
        $this->samples = "";
        $this->showModal();
    }

    #[On('edit-item')]
    public function onEditFired($id)
    {
        $this->modalTitle = "Edit attribute list";
        $attributeList = AttributeList::findOrFail($id);

        $this->samples = $attributeList->getSamples();
        $this->id = $attributeList->id;
        $this->name = $attributeList->name;
        $this->comment = $attributeList->comment;

        $this->showModal();
    }

    #[On('duplicate-item')]
    public function onDuplicateFired($id)
    {
        $this->modalTitle = "Duplicate attribute list";
        $attributeList1 = AttributeList::findOrFail($id);

        $this->authorize('create', AttributeList::class);

        $attributeList = $attributeList1->replicate()->fill([
            'name' => $attributeList1->name." Copy"
        ]);

        $this->id = $attributeList->id;
        $this->name = $attributeList->name;
        $this->comment = $attributeList->comment;

        $this->showModal();

    }

    #[On('delete-item')]
    public function onDeleteFired($id)
    {
        $attributeList = AttributeList::findOrFail($id);
        $this->authorize('delete', $attributeList);
        $attributeList->delete();
        $request = request();
        $request->session()->flash('flash.banner', 'Attribute list deleted!');
        $request->session()->flash('flash.bannerStyle', 'success');
        $this->redirectRoute('attribute-lists');

    }

    #[On('list-of-values')]
    public function onListOfValues($id)
    {
        $this->hideModal();
        log::debug('list-of-values');
        $attributeList = AttributeList::findOrFail($id);
        $this->redirectRoute('attribute-list-values',['attributeList' => $attributeList]);
    }


    public function showModal(){
        $this->showingModal = true;
        $this->resetValidation();
    }

    public function hideModal(){
        $this->showingModal = false;
    }

}
