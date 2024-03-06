<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AttributeListValue;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use App\Exports\AttributesExport;
use Maatwebsite\Excel\Facades\Excel;

class AttributeListValuesTable extends DataTableComponent
{

    public $attributeList;

    public function builder(): Builder
    {
        return AttributeListValue::query()
            ->where('attribute_list_id','=',$this->attributeList->id); // Select some things
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
            AttributeListValue::find($item[$this->getPrimaryKey()])->update(['sort' => (int)$item[$this->getDefaultReorderColumn()]]);
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
            Column::make("Odoo name", "odoo_name")
                ->sortable()->searchable()->hideIf(! $showOdoo),
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
                ->html()->collapseAlways(),
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
