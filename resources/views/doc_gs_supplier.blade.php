@push('pagetitle', 'Getting started - Supplier')
@push('breadcrumb')
@php(
$breadcrumb_items = [
        ['title' => 'Documentation', 'url' => route('home')],
    ['title' => 'Getting started - Supplier', 'url' => route('doc_gs_supplier')],

]
)
<livewire:show-breadcrumb :items="$breadcrumb_items" />
@endpush
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <div class="flex items-center">
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Getting started - Supplier
                            </h1>
                        </div>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            You are a supplier, and aim to offer a true service to your clients.
                            You can help them to save time, money, and improve the visibility of
                            your products on their website.
                            You will also ensure they will work with up to date and
                            <strong>correct data about your products</strong> (correct prices,
                            correct characteristics, correct description).
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            By suppling OMEDIS conform data, you will help them to integrate your
                            product data automatically in their IT systems (ERP, E-commerce Website etc.)
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            The current page will gives you guidelines for helping your team to provide
                            conform files.
                        </p>
                    </div>

                    <div>
                        <img src="{{ asset('storage/suplier-1.jpg') }}"  class="mt-0 " />
                    </div>


                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div>
                        <h2 id="p4" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Synopsis</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            The <strong>goal</strong> is to generate files containing all products data in a standarized format.
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Your can generate these file
                        </p>
                        <ul class="mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Manually, starting from template files.</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Programatically from your ERP software (recommended way)</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Programatically from your legacy data files</li>
                        </ul>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            The OMEDIS website offer  tools for checking validity of your generated files.
                            Once the files generated, it's up to you to send them to desired retailers.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('storage/suplier-2.png') }}"  class="mt-0 " />
                    </div>

                    <div>
                        <h2 id="p3" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Manually create OMEDIS conform file</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            The easiest way for you is to download a sample excel file, and modify his content. OMEDIS suggest not to use Excel
                            file format (prefering CSV or XML), but if you create it manually, it stays the easiest way.
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"><a href="{{ URL::to( 'storage/sample.xmsx')  }}"><i class="fa-solid fa-file-arrow-down"></i> Download a sample Excel</a> file</p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            you have to fill the file with one line for each individual product reference (i.e ean).
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            When one product has many variants (ie. size, color, ...), each variant is represented on one line,
                            sharing same name, season, brand.
                            Specificities of each variant are defined in the columns called <strong>var-xxxxx</strong> like var-color, var-surface-m2. These
                            columns have to be filled <string>only</string> to distinguish variants, and not to describe a single product.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('storage/suplier-3.png') }}"  class="mt-0 " />
                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            NPBLB : color black is not defining a variant since the clamp has no variant
                        </p>
                        <p class="mt-0 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            NPAT4,5,6 : red color is not defining a specific variant since every variant has red color
                        </p>
                    </div>

                    <div>
                        <h2 id="p3" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Programatically from your ERP software</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Your will develop a small script (depending of your ERP, it's about 1 to 3 days of development ... 500 > 1500eur) that will
                        </p>
                        <ul class="mt-0 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Extract suitable data from your database</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Convert some value to OMEDIS conform values, using conversion tables based on list of valid values </li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Write data in OMEDIS conform file (csv, xml), using file structure definition</li>
                        </ul>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <strong>Conversion tables</strong> : for some attributes based on list of values (ex. category, var-color), your script will use conversion table from your internal data
                            to omedis standard data. For you to build these tables, your can directly <a href="{{ route('attribute-list-values',2) }}">download the list of valid value</a> from OMEDIS website.


                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <strong>OMEDIS File format</strong> : the structure of data in each type of available file type is defined in the <a href="{{ route('containers') }}" >'container' documentation</a>.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('storage/suplier-4.png') }}"  class="mt-0 " />
                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Exemple of data in the "category" conversion table :
                        </p>
                        <ul class="mt-0 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Your category : "WING" > Omedis category : "watersports-wingfoil-wing"</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Your category : "FOILBOARD" > Omedis category : "watersports-wingfoil-board"</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Your category : "FOIL - PLANE" > Omedis category : "watersports-wingfoil-hydofoil-part"</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Your category : "CARBON MAST" > Omedis category : "watersports-wingfoil-hydofoil-part"</li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
