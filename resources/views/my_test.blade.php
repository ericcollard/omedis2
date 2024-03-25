<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @push('pagetitle', 'Attributes')
            @push('breadcrumb')
                @php(
                $breadcrumb_items = [
                            ['title' => 'Test', 'url' => '/test'],
                        ]
                )
                <livewire:show-breadcrumb :items="$breadcrumb_items" />
            @endpush

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="p-6 lg:p-8 border-b border-gray-200">


                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                        ecosystem to be a breath of fresh air. We hope you love it.
                    </p>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
