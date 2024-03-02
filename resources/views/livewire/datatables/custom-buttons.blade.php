@aware(['component'])

@if ($component->isTailwind())
    <div class="w-full mb-4 md:w-auto md:mb-0">
        <div     class="relative z-10 inline-block w-full text-left md:w-auto">

            <div>
                <span class="rounded-md shadow-sm">
                    <button
                        wire:click="$dispatch('create-item')"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                        Create
                    </button>
                </span>
            </div>

        </div>
    </div>
@elseif ($component->isBootstrap())
    <div><!-- Implement Other Themes if needed--></div>
@endif
