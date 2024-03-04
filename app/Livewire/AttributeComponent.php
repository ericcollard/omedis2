<?php

namespace App\Livewire;

use App\Models\Attribute;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class AttributeComponent extends Component
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

    #[Validate('string', message: 'This field should be a string')]
    #[Validate('nullable', message: 'This field is not required')]
    public $odoo_name;

    public $comment;

    #[Validate('boolean', message: 'This field has to bee true of false')]
    #[Validate('required', message: 'This field is required')]
    public $required;

    public $attribute_list_id;

    public $unit_id;

    #[Validate('required', message: 'This field is required')]
    public $data_type_id;

    ## this function allow to replace empty string by null value in database
    public function updated($name, $value)
    {
        if (gettype($value) != 'boolean')
        {
            if ( $value == '' ) data_set($this, $name, null);
        }
    }

    public function store()
    {
        log::debug('store');
        $this->validate();
        log::debug('validated');

        $data = [
            'name' => $this->name,
            'odoo_name' => $this->odoo_name,
            'comment' => $this->comment,
            'required' => $this->required,
            'attribute_list_id' => $this->attribute_list_id,
            'unit_id' => $this->unit_id,
            'data_type_id' => $this->data_type_id,
        ];

        if ($this->id)
        {
            $attribute = Attribute::findOrFail($this->id);
            $this->authorize('update', $attribute);
            $attribute->update($data);
            session()->flash('flash.banner', 'Attribute updated!');
        }
        else
        {
            $this->authorize('create', Attribute::class);
            Attribute::create($data);
            session()->flash('flash.banner', 'Attribute created!');
        }


        $this->hideModal();
        $this->reset();
        session()->flash('flash.bannerStyle', 'success');

        $this->redirectRoute('attributes');

    }

    public function render()
    {
        return view('livewire.attribute-component');
    }

    #[On('create-item')]
    public function onCreateFired()
    {
        log::debug('Create fired ');
        $this->modalTitle = "Create attribute";
        $this->required = false;
        $this->showModal();
    }

    #[On('edit-item')]
    public function onEditFired($id)
    {
        $this->modalTitle = "Edit attribute";
        $attribute = Attribute::findOrFail($id);

        $this->id = $attribute->id;
        $this->name = $attribute->name;
        $this->odoo_name = $attribute->odoo_name;
        $this->comment = $attribute->comment;
        $this->required = $attribute->required;
        $this->attribute_list_id = $attribute->attribute_list_id;
        $this->unit_id = $attribute->unit_id;
        $this->data_type_id = $attribute->data_type_id;

        $this->showModal();
    }

    #[On('duplicate-item')]
    public function onDuplicateFired($id)
    {
        $this->modalTitle = "Duplicate attribute";
        $attribute1 = Attribute::findOrFail($id);

        $this->authorize('create', Attribute::class);

        $attribute = $attribute1->replicate()->fill([
            'name' => $attribute1->name." Copy"
        ]);

        $this->id = $attribute->id;
        $this->name = $attribute->name;
        $this->odoo_name = $attribute->odoo_name;
        $this->comment = $attribute->comment;
        $this->required = $attribute->required;
        $this->attribute_list_id = $attribute->attribute_list_id;
        $this->unit_id = $attribute->unit_id;
        $this->data_type_id = $attribute->data_type_id;

        $this->showModal();

    }

    #[On('delete-item')]
    public function onDeleteFired($id)
    {
        $attribute = Attribute::findOrFail($id);
        $this->authorize('delete', $attribute);
        $attribute->delete();
        $request = request();
        $request->session()->flash('flash.banner', 'Attribute deleted!');
        $request->session()->flash('flash.bannerStyle', 'success');
        $this->redirectRoute('attributes');

    }

    public function showModal(){
        $this->showingModal = true;
        $this->resetValidation();
    }

    public function hideModal(){
        $this->showingModal = false;
    }

}
