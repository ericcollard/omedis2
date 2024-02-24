<ol class="flex  items-center whitespace-nowrap">
    <li class="inline-flex ">
        <a class="flex items-center font-semibold text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="/">
            <svg class="w-5 h-5 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19c0 .6.4 1 1 1h3v-3c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v3h3c.6 0 1-.4 1-1v-8.5"/>
            </svg>
        </a>
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-500 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
    </li>
    @if (isset($items))
    @foreach ($items as $key => $item)
        <li class="inline-flex ">
            <a class="flex items-center font-semibold text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="{{ $item['url'] }}">
                {{ $item['title'] }}
                @if ($key !== array_key_last($items))
                    <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-500 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                @endif
            </a>
        </li>
    @endforeach
    @endif
</ol>
