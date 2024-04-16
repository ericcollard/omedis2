@push('pagetitle', 'Getting started - Retailer')
@push('breadcrumb')
    @php(
    $breadcrumb_items = [
            ['title' => 'Documentation', 'url' => route('home')],
        ['title' => 'Getting started - Retailer', 'url' => route('doc_gs_retailer')],

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
                                Getting started - Retailer
                            </h1>
                        </div>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            You are a retailer, and you want feed your IT systems (ESR, gescom, website etc.) automatically
                            without entering manually all information (time waste, risk of mistakes). Each time your supplier
                            is updating these data, you want to automatically update your system.
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            By using OMEDIS conform data, you will be able to use a standardized source of data, and ask your
                            It partner to supply a generic tool for this data integration in your systems.
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            The current page will give you guidelines for helping your team to use Omedis
                            conform files.
                        </p>
                    </div>

                    <div>
                        <img src="{{ asset('storage/retailer-1.png') }}"  class="mt-0 " />
                    </div>


                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div>
                        <h2 id="p4" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Synopsis</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            The <strong>goal</strong> is to read data contained in a Omedis formatted file, and integrate them automatically in your IT system.
                            The way you can achieve this task in mainly dependant to your own system, but using OMEDIS file will ensure
                        </p>
                        <ul class="mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Using the same format for all your suppliers</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Having all data in the same file (characteristics, prices, pictures, classification, ...) </li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Avoiding mistakes when type in manually</li>
                        </ul>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            The OMEDIS website offers tools for checking validity of provided files. You will also find a complete
                            description of the standard, so that your IT team (or IT partner) can develop a full automatic integration tool.
                            Depending on the complexity of your IT system, the cost of this development is about 500 to 1500€ (1 to 3 days of developer work). It's
                            dramatically less than the time you waste every season to manually (or semi-automatically) enter data in your system.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('storage/retailer-2.png') }}"  class="mt-0 " />
                    </div>

                    <div>
                        <h2 id="p3" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Programatically integrate OMEDIS data</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Your will have to develop a script that
                        </p>
                        <ul class="mt-0 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Extract data from OMEDIS file</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Convert values to be compatible to your system, using conversion tables</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Write data in your system</li>
                        </ul>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <strong>Conversion tables</strong> : for some attributes based on list of values (ex. category, var-color), your script will use conversion table from omedis representation
                            to your internal value. For you to build these tables, your can directly <a href="{{ route('attribute-list-values',2) }}">download the list of valid value</a> from OMEDIS website.
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <strong>OMEDIS File format</strong> : the structure of data in each type of available file type is defined in the <a href="{{ route('containers') }}" >'container' documentation</a>.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('storage/retailer-4.png') }}"  class="mt-0 " />
                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Exemple of data in the "category" conversion table :
                        </p>
                        <ul class="mt-0 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Omedis category : "watersports-wingfoil-wing" > Your category : "WING / WING"</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Omedis category : "watersports-wingfoil-board" > Your category : "WING / FOIL BOARDS"</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Omedis category : "watersports-wingfoil-hydofoil-part" > Your category : "WING / PIECES FOIL"</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Omedis category : "snowsport-allround-tecnical-wear-jacket-women" > Your category : "SKI / VETEMEMENTS / VESTE FEMME"</li>
                        </ul>
                    </div>

                    <div>
                        <h2 id="p3" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">How to ... Download list of value</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            In this tutorial, we will see how to export a list a valid values from omedis for one attribute. You will use it for feeding your comparaison tables.
                        </p>
                        <ul class="mt-0 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> 1- Display the available <a href="{{ route('attribute-lists') }}">attributes lists</a></li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> 2- Display available values <a href="{{ route('attribute-list-values',2) }}">for the desired attributes list (category as an exemple)</a></li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> 3- Select lines you want to export (all lines with top check box)</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> 4- Choose "Export" button in the "Bulk Action" Menu on top of the table</li>
                        </ul>
                    </div>
                    <div>
                        <img src="{{ asset('storage/retailer-5.png') }}"  class="mt-0 " />
                    </div>

                    <div>
                        <h2 id="p3" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Need some help ?</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            On our side, we already have developed an integration tool from OMEDIS to our ERP system and WEBSITE (ODOO).
                            This tool has two main features : create new products, and update existing one based on EAN codes.
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Since we already have faced some issues you can have, feel free to ask us some help or advices. We will do all what we can to support you.
                        </p>
                    </div>
                    <div>

                    </div>


                </div>
            </div>
        </div>
</x-app-layout>
