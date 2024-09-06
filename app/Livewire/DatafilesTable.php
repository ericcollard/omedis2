<?php

namespace App\Livewire;

use Illuminate\Support\Facades\URL;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Datafile;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class DatafilesTable extends DataTableComponent
{
    protected $model = Datafile::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("User", "user_id")
                ->sortable()->searchable(),
            Column::make("Supplier", "supplier")
                ->sortable()->searchable(),
            Column::make("File Path", "filepath")
                ->sortable()->excludeFromColumnSelect(),
            Column::make("Updated at", "updated_at")
                ->sortable()->excludeFromColumnSelect(),
            /*
            LinkColumn::make('Download')
                ->title(fn($row) => 'Get')
                ->location(fn($row) => route('datafiledownload', $row->id)),*/
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatables.action-column-editdeletedown')->with(
                        [
                            'rowId' => $row->id
                        ]
                    )
                )->html(),
            Column::make("Id", "id")
                ->sortable()->collapseAlways(),
        ];
    }
}
