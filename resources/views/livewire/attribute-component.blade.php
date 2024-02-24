<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @push('pagetitle', 'Attributes')
        @push('breadcrumb')
            @php(
            $breadcrumb_items = [
                        ['title' => 'Attributes', 'url' => '/attributes'],
                    ]
            )
            <livewire:show-breadcrumb :items="$breadcrumb_items" />
        @endpush

        <livewire:attributes-table />

    </div>
</div>
