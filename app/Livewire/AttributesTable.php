<?php

namespace App\Livewire;

use App\Exports\AttributesExport;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class AttributesTable extends DataTableComponent
{

    public function builder(): Builder
    {
        return Attribute::query(); // Select some things
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
            Attribute::find($item[$this->getPrimaryKey()])->update(['sort' => (int)$item[$this->getDefaultReorderColumn()]]);
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
            BooleanColumn::make("Required", "required")
                ->sortable()->excludeFromColumnSelect(),
            Column::make("Odoo name", "odoo_name")
                ->sortable()->searchable()->hideIf(! $showOdoo),
            Column::make("Attribute List id", "attributeList.id")
                ->hideIf(true),
            LinkColumn::make('AttributeList')
                ->title(fn($row) => $row['attributeList.name'])
                ->location(fn($row) => "/attribute-list-values/".$row['attributeList.id']),
            Column::make("Attribute List id", "attributeList.name")
                ->hideIf(true),
            Column::make("Data type id", "dataType.id")
                ->hideIf(true),
            Column::make("Data type name", "dataType.name")
                ->hideIf(true),
            LinkColumn::make('Data type')
                ->title(fn($row) => $row['dataType.name'])
                ->location(fn($row) => "/datatypes/".$row['dataType.id'])->sortable()->searchable(),
            Column::make("Unit id", "unit.id")
                ->hideIf(true),
            Column::make("Unit name", "unit.name")
                ->hideIf(true),
            LinkColumn::make('Unit')
                ->title(fn($row) => $row['unit.name'])
                ->location(fn($row) => "/units/".$row['unit.id']),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatables.action-column')->with(
                        [
                            'rowId' => $row->id
                        ]
                    )
                )->html(),
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

        return Excel::download(new AttributesExport($items), 'attributes.xlsx');
    }

}
