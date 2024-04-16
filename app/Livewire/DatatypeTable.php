<?php

namespace App\Livewire;

use App\Exports\AttributesExport;
use App\Exports\DatatypesExport;
use App\Models\DataType;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DatatypeTable extends DataTableComponent
{

    public function builder(): Builder
    {
        return DataType::query(); // Select some things
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultReorderSort('sort', 'asc');
        $this->setHideReorderColumnUnlessReorderingEnabled();
        $this->setReorderEnabled();
        $this->setDefaultSort('sort', 'asc');
        $this->setConfigurableAreas([
            'toolbar-left-start' => ['livewire.datatables.custom-buttons', ['param1' =>'pappp']]
        ]);

    }


    public function reorder($items): void
    {

        if (auth()->guest())
            abort(403);

        if (!Auth()->user()->isAdmin() and !Auth()->user()->isContributor() ) {
            abort(403);
        }

        foreach ($items as $item) {
            DataType::find($item[$this->getPrimaryKey()])->update(['sort' => (int)$item[$this->getDefaultReorderColumn()]]);
        }
    }


    public function columns(): array
    {
        $showOdoo = false;
        if (auth()->check())
        {
            $showOdoo = auth()->user()->isAdmin();
        }
        return [
            Column::make('Order', 'sort')
                ->sortable()
                ->collapseOnMobile()
                ->excludeFromColumnSelect(),
            Column::make("Name", "name")
                ->sortable()->searchable()->excludeFromColumnSelect(),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatables.action-column')->with(
                        [
                            'rowId' => $row->id
                        ]
                    )
                )->html(),
            Column::make("validation_str", "validation_str")
                ->html()->sortable(),
            Column::make("Comment", "comment")
                ->format( fn($value, $row, Column $column) => $value)
                ->html()->sortable()->collapseAlways(),
            Column::make("Created by", "user.name")
                ->sortable()->collapseAlways(),
            Column::make("Updated at", "updated_at")
                ->sortable()->collapseAlways(),
            Column::make('ID', 'id')
                ->sortable()->collapseAlways(),
        ];
    }



    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $items = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new DatatypesExport($items), 'datatypes.xlsx');
    }

}
