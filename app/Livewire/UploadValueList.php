<?php

namespace App\Livewire;

use App\Imports\ImportHelpers;
use App\Imports\ValueListImport;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UploadValueList extends Component
{
    public $table_name;
    public $incoming_url;
    public $default_value;
    use WithFileUploads;
    #[Validate('required|mimes:csv,txt,xls,xlsx|max:1024')] // 1MB Max
    public $datafile;
    public $localFile = null;
    public $process_result = '';

    public function mount($table_name,$incoming_url,$default_value = '')
    {
        $this->table_name = $table_name;
        $this->incoming_url = $incoming_url;
        if (strlen($default_value) > 0)
            $this->default_value = $default_value;
        log::debug('mount');
        log::debug($this->default_value);
    }

    public function save()
    {
        $fileName = time().'-'.$this->datafile->getClientOriginalName();
        $this->datafile->storeAs(path:'datafile',name: $fileName);

        $fileRelPath = 'datafile/'.$fileName;
        $fileFullPath = storage_path('app/'.$fileRelPath);


        if (!Storage::exists($fileRelPath))
        {
            abort(404, "Impossible to find ".$fileRelPath." file");
        }

        // lecture du fichier texte
        try {
            $this->process_result = '';
            Excel::import(new ValueListImport($this->table_name,$this->default_value),$fileName, 'datafile');
            $this->localFile = $fileName;
            $this->process_result = '<p><i class="fa-solid fa-circle-check text-green-400 text-xl"></i> Données importées correctement !</p>';
        }  catch (HttpException $e) {
            switch ($e->getStatusCode())
            {
                case 404:
                    abort(404, "Impossible to open ".$fileRelPath." file");
                    break;
                case 500:
                    //abort(500, $e->getMessage());
                    $errors_str = '<p><i class="fa-solid fa-triangle-exclamation text-red-500 text-xl"></i> Damned !! Your file is not conform to OMEDIS.</p><p class="mt-4">Errors found :</p>'.$e->getMessage();
                    $this->process_result =$errors_str;
                    break;
                default:
                    abort(500, "Oups ... unknown exception code : ".$e->getCode());
            }
        }

    }


    public function render()
    {
        log::debug($this->table_name);
        return view('livewire.upload-value-list');
    }
}
