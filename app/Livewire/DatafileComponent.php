<?php

namespace App\Livewire;


use App\Models\Datafile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DatafileComponent extends Component
{

    public $showingModal = false;
    public $modalTitle = "";

    public $listeners = [
        'hideMe' => 'hideModal'
    ];

    /* List of attributes for validation */
    public $id;
    #[Validate('min:3', message: 'This field is too short')]
    #[Validate('string', message: 'This field should be a string')]
    #[Validate('required', message: 'This field  is required')]
    public $name;
    public $supplier;


    public function render()
    {
        return view('livewire.datafile-component');
    }

    public function store()
    {
        log::debug('store');
        $this->validate();

        $data = [
            'name' => $this->name,
            'supplier' => $this->supplier,
        ];

        if ($this->id)
        {
            $datafile = Datafile::findOrFail($this->id);
            $this->authorize('update', $datafile);
            $datafile->update($data);
            session()->flash('flash.banner', 'Datafile updated!');
        }

        $this->hideModal();
        $this->reset();
        session()->flash('flash.bannerStyle', 'success');

        $this->redirectRoute('datafiles');

    }

    #[On('edit-item')]
    public function onEditFired($id)
    {
        $this->modalTitle = "Edit datafile";
        $datafile = Datafile::findOrFail($id);

        $this->id = $datafile->id;
        $this->name = $datafile->name;
        $this->supplier = $datafile->supplier;

        $this->showModal();
    }

    #[On('download-item')]
    public function onDownloadFired($id)
    {
        $datafileDirectory = "omedisdatafile/";
        $datafile = datafile::findOrFail($id);
        if ($datafile)
        {
            return Storage::download($datafileDirectory.$datafile->filepath);
        }
    }

    #[On('delete-item')]
    public function onDeleteFired($id)
    {
        $datafile = Datafile::findOrFail($id);
        $this->authorize('delete', $datafile);
        $filepath = $datafile->filepath;
        Storage::disk('omedisdatafile')->delete($filepath);
        $datafile->delete();

        $request = request();
        $request->session()->flash('flash.banner', 'Datafile deleted!');
        $request->session()->flash('flash.bannerStyle', 'success');
        $this->redirectRoute('datafiles');
    }

    public function showModal(){
        $this->showingModal = true;
        $this->resetValidation();
    }

    public function hideModal(){
        $this->showingModal = false;
    }


}
