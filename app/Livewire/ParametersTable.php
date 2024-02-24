<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Parameter;

class ParametersTable extends DataTableComponent
{
    protected $model = Parameter::class;


    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setBulkActions([
            'exportSelected' => 'Export',
            'deleteSelected' => 'Delete',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Value", "value")
                ->sortable()
            ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function exportSelected()
    {
        foreach($this->getSelected() as $item)
        {
            // These are strings since they came from an HTML element
            log::debug($item);
        }
        $this->clearSelected();
    }

    public function deleteSelected()
    {
        foreach($this->getSelected() as $item)
        {
            // These are strings since they came from an HTML element
            log::debug($item);
        }
        $this->clearSelected();
    }

}
