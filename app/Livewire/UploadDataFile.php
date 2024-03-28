<?php

namespace App\Livewire;

use App\Imports\ImportHelpers;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UploadDataFile extends Component
{
    use WithFileUploads;
    #[Validate('required|mimes:csv,txt,xls,xlsx|max:1024')] // 1MB Max
    public $datafile;
    public $localFile = 'nc.';
    public $process_result = '';


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
            ImportHelpers::bulkImport($fileName, 'datafile');
            $this->localFile = $fileName;
            $return_data = ImportHelpers::checkImportedData();
            $errors = $return_data['errors'];
            $result = $return_data['result'];

            if (strlen($errors) == 0) {
                $this->process_result = '<p><i class="fa-solid fa-circle-check text-green-400 text-xl"></i> Yeah !! Your file is conform to OMEDIS without error.</p>'.$result;
            }
            else {
                $this->process_result = '<p><i class="fa-solid fa-triangle-exclamation text-red-500 text-xl"></i> Damned !! Your file is not conform to OMEDIS.</p>'.$result.'<p class="mt-4">Errors found :</p>'.$errors;
            }

        }  catch (Exception $e) {
            abort(404, "Impossible to open ".$fileRelPath." file");
        }
    }

    public function render()
    {
        return view('livewire.upload-data-file');
    }
}
