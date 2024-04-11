@push('pagetitle', 'Product Odoo Data')
@push('breadcrumb')
    @php(
    $breadcrumb_items = [
                ['title' => 'All products', 'url' => route('products')],
                ['title' => 'Product Odoo Data', 'url' => '#'],
            ]
    )
    <livewire:show-breadcrumb :items="$breadcrumb_items" />
@endpush


<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class=" grid grid-cols-1  gap-6 lg:gap-8 p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Product # {{ $product->id }} : {!! $product->toString(1,0) !!}
                    </h1>

                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 gap-4 p-4 bg-grey">
                    {!! $product->toString(0,1) !!}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
