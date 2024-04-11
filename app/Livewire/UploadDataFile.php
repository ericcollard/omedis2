<?php

namespace App\Livewire;

use App\Imports\ImportHelpers;
use App\Jobs\ConvertData2Odoo;
use App\Jobs\IngestData;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UploadDataFile extends Component
{
    use WithFileUploads;
    #[Validate('required|mimes:csv,txt,xls,xlsx|max:1024')] // 1MB Max
    public $datafile;
    public $localFile = null;
    public $process_result = '';
    public $ingest_result = '';
    public $ingest_data = '';
    public $formatted_product_data = '';
    public $odoo_data = '';

    public function ingest()
    {
        log::debug('ingest');
        IngestData::dispatch();
        $this->ingest_result = '<p>Ingestion ended</p>';
    }

    public function convert()
    {
        log::debug('convert');
        ConvertData2Odoo::dispatch();
        log::debug('convert ended');
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
            $this->ingest_data = '';
            ImportHelpers::bulkImport($fileName, 'datafile');
            $this->localFile = $fileName;
            ImportHelpers::checkImportedData();
        }  catch (Exception $e) {
            abort(404, "Impossible to open ".$fileRelPath." file");
        }

    }

    public function render()
    {
        $errors = ImportHelpers::getErrors();
        $warnings = ImportHelpers::getErrors('warning');
        $result = ImportHelpers::getReport(4);
        $this->formatted_product_data = Product::getReport();
        $this->odoo_data = Product::getOdooReport();
        if ($this->localFile)
        {
            if (strlen($errors) == 0) {
                $errors_str = '<p><i class="fa-solid fa-circle-check text-green-400 text-xl"></i> Yeah !!Your file is conform to OMEDIS without error.</p>';
            }
            else {
                $errors_str = '<p><i class="fa-solid fa-triangle-exclamation text-red-500 text-xl"></i> Damned !! Your file is not conform to OMEDIS.</p><p class="mt-4">Errors found :</p>'.$errors;
            }
            if (strlen($warnings) > 0) {
                $errors_str = $errors_str.'<p><i class="fa-solid fa-triangle-exclamation text-yellow-600 text-xl"></i> Warning !! These elements should be corrected.</p>'.$warnings;
            }
            $this->process_result = $errors_str.$result;
        }

        if (strlen($errors) == 0) {
            $this->ingest_data = '<p><i class="fa-solid fa-circle-check text-green-400 text-xl"></i> Data are conform to OMEDIS without error.</p>';
        }
        else {
            $this->ingest_data = '<p><i class="fa-solid fa-triangle-exclamation text-red-500 text-xl"></i> Data are not conform to OMEDIS.</p>';
        }

        $this->ingest_data .= ImportHelpers::getReport(4);
        return view('livewire.upload-data-file');
    }
}
