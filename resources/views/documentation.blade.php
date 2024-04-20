<x-app-layout>

    @push('pagetitle', 'Documentation')
    @push('breadcrumb')
        @php(
        $breadcrumb_items = [
                    ['title' => 'Documentation', 'url' => route('home')],
                ]
        )
        <livewire:show-breadcrumb :items="$breadcrumb_items" />
    @endpush


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent">
                    <div>
                        <div class="flex items-center">
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Outdoor Market Electronic Data Interchange Standard
                            </h1>
                        </div>
                        <img src="{{ asset('storage/omedis-principe.png') }}" class="w-48 h-auto md:w-80 md:h-auto md:rounded-none mx-auto"/>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            OMEDIS is defining the industry standard in Commercial
                            Product Data Exchange between suppliers and retailers. Thanks to this standard, partners can speed up,
                            securing and making reliable information exchanges. <strong>LET'S SPEAK THE SAME LANGAGE !</strong>
                        </p>
                    </div>

                    <div>
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Save time, save money, increase business
                            </h2>
                        </div>

                        <ul class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <li><i class="fa-regular fa-star fa-2xs"></i> Dramatically reduce time sped for Data Entry</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Increase data reliability</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Reduce price update delay</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Enhance product visibility on e-commerce website</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Speed up business</li>
                            <li><i class="fa-regular fa-star fa-2xs"></i> Increasing efficiency for both instore and online business</li>
                        </ul>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Spending hours in data entry has definitely no added value. By speed up and securing product data update, let's focuse on service, advice and b2c trade
                        </p>
                    </div>


                </div>

                <div class="bg-white grid grid-cols-1 gap-6 ">
                    <div class="p-6">
                    <livewire:partners />
                    </div>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div>
                        <h2 id="p4" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">What is OMEDIS ?</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            OMEDIS is defining a standard (langage) for data exchange between brands, distributors and retailers, related to product data.
                            This includes technical data like size or color, logistical data like weight and dimensions, business data like wholesale price or retail price,
                            marketing data like marketing description or pictures.
                            <br/>
                            OMEDIS is based on a collective public repository that can be updated by the community, letting everyone be aware of updates.
                            <br/>
                            OMEDIS is freely accessible, and will stay free lifetime, because standardisation of exchange is a win-win feature for all partners.
                        </p>
                    </div>

                    <div>
                        <h2 id="p5" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">What is not OMEDIS ?</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            OMEDIS is not a software, but only a standard definition. The current website is only the tool giving easy access to the standard definition.
                            <br/>OMEDIS does nothing, except helping partners to exchange data with efficiency.
                            <br/>OMEDIS will not manage the exchange of data. This stay the role of partners that can control the diffusion.
                            <br/>OMEDIS is not a goal but only a middleware
                        </p>
                    </div>

                    <div>
                        <h2 id="p3" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">What is a standard ?</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            As soon as we need to process data with automatic or semi-automatic engine, we need to standardize so that IT systems can talk together.
                        </p>
                        <h3 class="mt-4 text-orange-600 font-semibold dark:text-gray-400 text-md leading-relaxed">Defining format for open data</h3>
                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            As an exemple, let take a numerical value with decimal part, representing the retail price of one product.
                            <br/>We can write this value in several ways : "1245.85" or "1245,85 €" or "1 245,85€" or "1,245.85 Eur"
                            <br/>The standard is fixing the official way to exchange this value between two computing systems : "1245.85"
                        </p>
                    </div>

                    <div>

                        <h3 class="mt-4 text-orange-600 font-semibold dark:text-gray-400 text-md leading-relaxed"></br>Defining key values for closed data</h3>
                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Let's take a string value representing the category of product for classification. Depending on company internal classification, you can find the following value :
                            <br/>- "Windsurf boardbag"
                            <br/>- "Windsurfing Board Protection"
                            <br/>- "windsurf-protection-boardbag"
                            <br/>- "Housse de flotteur de windsurf"
                            <br/>The standard is defining a list of possible values, that each computing systems can relate to his own internal representation.
                            <br/>For the current case, this will be : "watersports-windsurf-bag"
                        </p>
                    </div>

                    <div>
                        <h2 id="p6" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">OMEDIS more in details</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            OMEDIS is defining
                            <br/>- The possible containers and organisation for data exchange (ie. csv file, excel file, xml file, api call)
                            <br/>- The <a href="{{ route('attributes') }}">list of possible columns</a> in your data file, including mandatory and optional attributes (like brand name, product name, categories, prices)
                            <br/>- The <a href="{{ route('datatypes') }}">list of datatype</a> (Ex. String, Currency, Integer, Boolean), and the way to write them (character coding, delimiters, limits etc.)
                            <br/>- The <a href="{{ route('units') }}">list of units</a> (Ex. Eur, Usd, Liter, Meter, Kilogram), the way to name them, and the way to use them.
                            <br/>- The list of available values for closed attributes (like colors, categories, brand name, etc.).
                        </p>
                    </div>

                    <div>
                        <h2 id="p6" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Developp One time, use Many</h2>
                        <br/><img src="{{ asset('storage/onlyonetime.jpg') }}"  class="mt-0 " />
                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Thanks to this standard, each supplier has only to develop one translation program from his own ERP to OMEDIS.
                            Each retailer has only to develop one translation program from OMEDIS to his own retail management system.
                        </p>
                    </div>

                    <div>
                        <h2 id="p8" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">How to start with OMEDIS ?</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            We suggest that you start by <a href="{{ route('containers') }}">downloading</a> a sample CSV or XML file, so that you will clearly understand the <a href="{{ route('containers') }}">structure of files</a>.
                            <br/>
                            Then you can have a look at the list of possible <a href="{{ route('attributes') }}">attributes</a> for each product. For each one, you will
                            find the required datatype and unit.
                            <br/>
                            Now it's time for you to develop a program that can export (if you are a brand) or import (if you are a retailer) data to or from your own IT system.
                            <br/>This program will be a sort of translator from or to you system.
                        </p>
                    </div>
                    <div>
                        <h2 id="p9" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Need some help ?</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <a href=" {{ route ('doc_gs_supplier') }}">Tutorial for suppliers that want to create OMEDIS compliant file</a>
                        </p>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <a href=" {{ route ('doc_gs_retailer') }}">Tutorial for retailers that want to use OMEDIS compliant file</a>
                        </p>
                    </div>



                    <div>
                        <h2 id="p1" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">What is EDI ?</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            EDI acronym is for Electronic Data Interchange. EDI is a technique that replaces physical exchange of documents between companies (data, orders, invoices, delivery slips, etc.) according to a standardised format.
                            The data are structured according to referenced international technical standards (e.g. Edifact).
                        </p>
                    </div>
                    <div>
                        <h2 id="p2" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Why EDI for outdoor industry ?</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            From now on, all retailers are using an invoicing/stock management IT tool and/or an e-commerce website.
                            Therefore, they all need to integrate product-related business data into some computer system.
                            Inter-company electronic data interchange is therefore now at the heart of our daily work.
                            Thanks to the will for brands offering best possible product for each need, the volume of data is growing exponentially with ever-longer lists of products.
                            <br/>On the retailer side, integration of these data is beginning to weight significantly on the work-hours.
                            On top of all this time that is no more devoted to customers, manual input is a large source of errors as well.
                            <br/>So it is essential to rationalize these exchanges and automate as much as possible the tedious data entry tasks.
                        </p>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
