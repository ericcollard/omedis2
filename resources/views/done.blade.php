<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @push('pagetitle', 'Attributes')
            @push('breadcrumb')
                @php(
                $breadcrumb_items = [
                            ['title' => 'Done', 'url' => '/test'],
                        ]
                )
                <livewire:show-breadcrumb :items="$breadcrumb_items" />
            @endpush

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="p-6 lg:p-8 border-b border-gray-200 text-gray-500 leading-relaxed">

                    <p class="mt-6 ">
                        Done ...
                    </p>
                    {!! $errors !!}
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
