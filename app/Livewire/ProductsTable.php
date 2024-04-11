<?php

namespace App\Livewire;

use App\Exports\AttributesExport;
use App\Models\DataType;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductsTable extends DataTableComponent
{
    protected $model = Product::class;

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
            Product::find($item[$this->getPrimaryKey()])->update(['sort' => (int)$item[$this->getDefaultReorderColumn()]]);
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Order', 'sort')
                ->sortable()
                ->collapseOnMobile()
                ->excludeFromColumnSelect(),
            Column::make("Selected", "selected")
                ->format(
                    fn($value, $row, Column $column) => (($row->selected == 0) ? '<i class="fa-solid fa-ban text-red-400 text-xl"></i>' : '<i class="fa-solid fa-circle-check text-green-400 text-xl"></i>')
                )
                ->html(),
            Column::make("Name", "name")
                ->sortable()->searchable()->excludeFromColumnSelect(),
            Column::make("Season", "season")
                ->sortable()->searchable()->excludeFromColumnSelect(),
            Column::make("Brand", "brand")
                ->sortable()->searchable()->excludeFromColumnSelect(),
            Column::make("Category", "category")
                ->sortable()->searchable()->excludeFromColumnSelect(),
            Column::make('Variant Nb')
                ->label(
                    fn($row, Column $column) => $row->getVariantCount()
                )
                ->html(),
            Column::make('Variants')
                ->label(
                    fn($row, Column $column) => $row->getVariantsAbstarct()
                )
                ->html()->collapseAlways(),
            Column::make("Id", "id")
                ->sortable()->collapseAlways(),
            Column::make("Created by", "user.name")
                ->sortable()->collapseAlways(),
            Column::make("Created at", "created_at")
                ->sortable()->collapseAlways(),
            Column::make("Updated at", "updated_at")
                ->sortable()->collapseAlways(),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
            'select' => 'Select',
        ];
    }
    public function select()
    {
        $items = $this->getSelected();
        foreach ($items as $item)
        {
            $product = Product::find($item);
            $product->selected= true;
            $product->save();
            log::debug($item);
        }
        $this->clearSelected();
    }


    public function export()
    {
        $items = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new AttributesExport($items), 'units.xlsx');
    }

}
