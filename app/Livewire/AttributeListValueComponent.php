<?php

namespace App\Livewire;

use App\Models\AttributeList;
use App\Models\AttributeListValue;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class AttributeListValueComponent extends Component
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

    #[Validate('string', message: 'This field should be a string')]
    #[Validate('nullable', message: 'This field is not required')]
    public $odoo_name;

    public $attributeListId;
    public $attributeListName;

    public function render()
    {
        return view('livewire.attributelistvalue-component');
    }

    public function mount($attributeListId = null)
    {
        $this->attributeListId = $attributeListId;
        $this->currentUrl = url()->current();
        if ($this->attributeListId)
            $this->attributeListName = AttributeList::find($this->attributeListId)->name;
        else
            $this->attributeListName = 'All';
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'comment' => $this->comment,
            'odoo_name' => $this->odoo_name,
            'attribute_list_id' => $this->attributeListId,
        ];

        if ($this->id)
        {
            $attributeListValue = AttributeListValue::findOrFail($this->id);
            $this->authorize('update', $attributeListValue);
            $attributeListValue->update($data);
            session()->flash('flash.banner', 'AttributeListValue updated!');
        }
        else
        {
            $this->authorize('create', AttributeListValue::class);
            AttributeListValue::create($data);
            session()->flash('flash.banner', 'AttributeListValue created!');
        }


        $this->hideModal();
        $this->reset();
        session()->flash('flash.bannerStyle', 'success');

        $this->redirectRoute('attribute-lists');

    }



    #[On('create-item')]
    public function onCreateFired()
    {
        log::debug('Create fired ');
        $this->modalTitle = "Create attribute list value";
        $this->name = "";
        $this->comment = "";
        $this->odoo_name = "";
        $this->showModal();
    }

    #[On('edit-item')]
    public function onEditFired($id)
    {
        $this->modalTitle = "Edit attribute list value";
        $attributeListValue = AttributeListValue::findOrFail($id);

        $this->odoo_name = $attributeListValue->odoo_name;
        $this->id = $attributeListValue->id;
        $this->name = $attributeListValue->name;
        $this->comment = $attributeListValue->comment;

        $this->showModal();
    }

    #[On('duplicate-item')]
    public function onDuplicateFired($id)
    {
        $this->modalTitle = "Duplicate attribute list value";
        $attributeListValue1 = AttributeListValue::findOrFail($id);

        $this->authorize('create', AttributeListValue::class);

        $attributeListValue = $attributeListValue1->replicate()->fill([
            'name' => $attributeListValue1->name."-copy",
            'odoo_name' => $attributeListValue1->odoo_name."-copy"
        ]);

        $this->id = $attributeListValue->id;
        $this->name = $attributeListValue->name;
        $this->odoo_name = $attributeListValue->odoo_name;
        $this->comment = $attributeListValue->comment;

        $this->showModal();

    }

    #[On('delete-item')]
    public function onDeleteFired($id)
    {
        $attributeListValue = AttributeListValue::findOrFail($id);
        $this->authorize('delete', $attributeListValue);
        $attributeListValue->delete();
        $request = request();
        $request->session()->flash('flash.banner', 'Attribute list value deleted!');
        $request->session()->flash('flash.bannerStyle', 'success');
        $this->redirectRoute('attribute-lists');

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
            'table_name' => 'attribute_list_values',
            'incoming_url' => $return,
            'default_value' => 'attribute_list_id='.$this->attributeListId
        ]);
    }

}
