<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @push('pagetitle', 'Products')
        @push('breadcrumb')
            @php(
            $breadcrumb_items = [
                        ['title' => 'Products', 'url' => route('products')],
                    ]
            )
            <livewire:show-breadcrumb :items="$breadcrumb_items" />
        @endpush

        <livewire:products-table />

    </div>

</div>

