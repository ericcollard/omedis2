<?php

namespace App\Livewire;

use App\Exports\AttributesExport;
use App\Exports\ProductsExport;
use App\Models\AttributeListValue;
use App\Models\Product;
use App\Models\VariantAttributes;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\{DateFilter, MultiSelectFilter, SelectFilter};
use Illuminate\Database\Eloquent\Builder;

class ProductsTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultReorderSort('sort', 'asc');
        $this->setFilterLayout('slide-down');
        $this->setHideReorderColumnUnlessReorderingEnabled();
        $this->setReorderEnabled();
        $this->setDefaultSort('sort', 'asc');
        $this->setConfigurableAreas([
            'toolbar-left-start' => ['livewire.datatables.custom-buttons-select', ['param1' =>'pappp']]
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
            BooleanColumn::make("API", "selected"),
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
            LinkColumn::make('Odoo')
                ->title(fn($row) => 'See')
                ->location(fn($row) => route('product_odoo_data', $row->id)),
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

    public function filters(): array
    {
        return [
            MultiSelectFilter::make('Brand')
                ->options(
                    AttributeListValue::query()
                        ->orderBy('name')
                        ->where('attribute_list_id','=',3)
                        ->whereIn('id',VariantAttributes::where('attribute_id','=',1) ->pluck('value_int'))
                        ->get()
                        ->keyBy('name')
                        ->map(fn($tag) => $tag->name)
                        ->toArray()
                )->filter(function(Builder $builder, array $values) {
                    $builder->whereIn('brand', $values);
                }),
            MultiSelectFilter::make('Category')
                ->options(
                    AttributeListValue::query()
                        ->orderBy('name')
                        ->where('attribute_list_id','=',2)
                        ->whereIn('id',VariantAttributes::where('attribute_id','=',6) ->pluck('value_int'))
                        ->get()
                        ->keyBy('name')
                        ->map(fn($tag) => $tag->name)
                        ->toArray()
                )->filter(function(Builder $builder, array $values) {
                    $builder->whereIn('category', $values);
                }),
            MultiSelectFilter::make('Season')
                ->options(
                    VariantAttributes::query()
                        ->orderBy('value_int')
                        ->where('attribute_id','=',2)
                        ->get()
                        ->keyBy('value_int')
                        ->map(fn($tag) => $tag->value_int)
                        ->toArray()
                )->filter(function(Builder $builder, array $values) {
                    $builder->whereIn('season', $values);
                }),
        ];
    }


    public function bulkActions(): array
    {
        return [
            'export' => 'Export Omedis File',
            'select' => 'Select for API Export',
            'delete' => 'Delete',
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
        }
        $this->clearSelected();
    }

    public function delete()
    {
        $items = $this->getSelected();
        foreach ($items as $item)
        {
            $product = Product::find($item);
            $product->delete();
        }
        $this->clearSelected();
    }

    public function export()
    {
        $items = $this->getSelected();
        $this->clearSelected();
        return Excel::download(new ProductsExport($items), 'products.xlsx');
    }

}
