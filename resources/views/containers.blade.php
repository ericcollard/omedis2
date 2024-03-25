<x-app-layout>
    @push('pagetitle', 'Containers')
    @push('breadcrumb')
        @php(
        $breadcrumb_items = [
                    ['title' => 'Containers', 'url' => '/containers'],
                ]
        )
        <livewire:show-breadcrumb :items="$breadcrumb_items" />
    @endpush

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <div class="flex items-center">
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Containers (files)
                            </h1>
                        </div>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            This part or the standard is about organisation of data in datasets.
                            </br>You will also be able to download sample files.
                        </p>
                    </div>

                    <div>
                        <div class="flex items-center">
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"> We will define here</p>
                        </div>
                            <ul class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                <li><i class="fa-regular fa-star fa-2xs"></i> Which type of file we can use (ie. xls, csv, xml, api)</li>
                                <li><i class="fa-regular fa-star fa-2xs"></i> How data is organised in the file</li>
                            </ul>
                    </div>


                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div>
                        <h2 id="p7" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">File type</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Datas can be sent by digital file, or REST API.
                            </br>If using a file, we suggest to use <b>XML</b> or <b>CSV</b> file.
                            </br>We should avoid <b>EXCEL</b> native files (xls and xlsx) since content is highly dependant
                            from regional settings of the source computer. Keep in mind that excel file can be saved as csv.
                        </p>
                    </div>

                    <div>
                        <h2 id="p7" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">CSV file (tabular like file)</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"><a href="{{ URL::to( 'storage/sample.csv')  }}"><i class="fa-solid fa-file-arrow-down"></i> Download a sample CSV</a> file</p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            If using csv file, please report to the RFC 4180 standard :
                            </br>- The field separator has to be comma
                            </br>- End of line has to be CR/LF
                            </br>- Coding has to be UTF-8
                            </br>- Any field quoted with double quote
                            </br></br>First line has to be the list of attribute name (ie. columns), conform to OMEDIS <a href="{{ route('attributes') }}">attributes name</a>.
                            </br>The order of columns can be set freely. The first line will indicate what data should be considered.
                            </br>Next lines : each line is representing one product variant.
                        </p>
                        <p class="mt-4 text-gray-500 font-semibold dark:text-gray-400 text-sm leading-relaxed">Rules</p>
                        <ul class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Different variant of a same product needs to <strong>strictly share the same product name</strong>,
                                and be declared in consecutive lines. This is the way interpreting programs will group variants in a same product.</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Var-xxxx attributes has no be left empty if not defining a specific variant</li>
                        </ul>
                        <img class="mt-4" src="{{ asset('storage/omedis-data-file-logic.png') }}" />
                    </div>

                    <div>
                        <h2 id="p7" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">XML file</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"><a href="{{ URL::to( 'storage/sample.xml')  }}"><i class="fa-solid fa-file-arrow-down"></i> Download a sample XML</a> file</p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            If using csv file, please conform to XML 1.0 Specification :
                            </br>- Coding has to be UTF-8
                        </p>
                        <p class="mt-4 text-gray-500 font-semibold dark:text-gray-400 text-sm leading-relaxed">Rules</p>
                        <ul class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Variants of a same product has to <strong>be grouped in the same product tag</strong>.</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Var-xxxx attributes has to be specified only if defining a specific variant</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> A product without variant will have only one variant tag</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Each data has to be contained in a tag. The tag name has to be conform to OMEDIS <a href="{{ route('attributes') }}">attributes name</a>. </li>
                        </ul>
                        <img class="mt-4" src="{{ asset('storage/omedis-data-set-logic.jpg') }}" />
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
