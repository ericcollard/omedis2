
    @push('pagetitle', 'Upload')
    @push('breadcrumb')
        @php(
        $breadcrumb_items = [
                    ['title' => 'Upload', 'url' => '/upload_datafile'],
                ]
        )
        <livewire:show-breadcrumb :items="$breadcrumb_items" />
    @endpush

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class=" grid grid-cols-1 md:grid-cols-2  gap-6 lg:gap-8 p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <div>
                        <div class="flex items-center">
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Upload and check datafile
                            </h1>
                        </div>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            This part of the OMEDIS website is offering free tools for verifying the conformity of your datafiles.
                            </br>You will also be able to upload and check your files.
                        </p>
                    </div>

                    <div>

                        <form wire:submit="save">

                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >

                                <div class="font-[sans-serif] max-w-md mx-auto">
                                    <div class="flex items-center justify-between w-full">

                                        <input type="file"  wire:model="datafile"
                                               class=" text-black text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-2.5 file:px-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-black rounded" />
                                        <label for="uploadFile1"
                                               class="bg-gray-800 hover:bg-gray-700 text-white text-sm px-4 py-2.5 outline-none rounded w-max cursor-pointer mx-auto block font-[sans-serif]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mr-2 fill-white inline" viewBox="0 0 32 32">
                                                <path
                                                    d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                                    data-original="#000000" />
                                                <path
                                                    d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                                    data-original="#000000" />
                                            </svg>
                                            Upload
                                            <input type="submit" id='uploadFile1' class="hidden" />
                                        </label>

                                    </div>
                                    <p class="text-xs text-gray-400 mt-2">CSV, XLS, XLSX, XML are Allowed.</p>
                                    @error('datafile') <span class="error">{{ $message }}</span> @enderror
                                </div>



                                <!-- Progress Bar -->
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div>
                        <h2 id="p7" class="mt-4 text-lg font-semibold text-gray-500 dark:text-white">Results</h2>
                        <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <p>Local file : {{ $localFile }}</p>
                            {!! $process_result !!}

                        </div>
                    </div>

                </div>

                </div>
        </div>



    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class=" grid grid-cols-1 md:grid-cols-2  gap-6 lg:gap-8 p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                        <div>
                            <div class="flex items-center">
                                <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Ingest datafile
                                </h1>
                            </div>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                This OMEDIS tool is integrating uploaded data in the OMEDIS database.
                            </p>
                        </div>

                        <div>

                            <form wire:submit="ingest">

                                <label for="uploadFile2"
                                       class="bg-gray-800 hover:bg-gray-700 text-white text-sm px-4 py-2.5 outline-none rounded w-max cursor-pointer mx-auto block font-[sans-serif]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mr-2 fill-white inline" viewBox="0 0 32 32">
                                        <path
                                            d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                            data-original="#000000" />
                                        <path
                                            d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                            data-original="#000000" />
                                    </svg>
                                    Ingest
                                    <input type="submit" id='uploadFile2' class="hidden" />
                                </label>
                            </form>

                            <div class="font-[sans-serif] max-w-md mx-auto mt-4 text-gray-500 dark:text-gray-400 text-sm ">
                                <div  class="flex items-center justify-between w-full">
                                    <livewire:receiver-component />
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-2 md:grid-cols-2  gap-4 p-4 bg-grey">
                        <div>
                            <div class=" grid grid-cols-1 md:grid-cols-1 bg-white gap-4 p-4 sm:rounded-lg">
                                <div>
                                    <h2 class="font-semibold text-gray-500 " >Bulk Import DataTable</h2>
                                    <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                        {!! $ingest_data !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class=" grid grid-cols-1 md:grid-cols-1 bg-white gap-4 p-4 sm:rounded-lg">
                                <div>
                                    <h2 class="font-semibold text-gray-500 " >Formatted Product DataTable</h2>
                                    <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                        {!! $formatted_product_data !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

