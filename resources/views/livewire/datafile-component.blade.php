<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @push('pagetitle', 'Datafiles')
        @push('breadcrumb')
            @php(
            $breadcrumb_items = [
                        ['title' => 'Datafiles', 'url' => route('datafiles')],
                    ]
            )
            <livewire:show-breadcrumb :items="$breadcrumb_items" />
        @endpush


        <p class="mb-4 text-sm">This table is listing all stored OMEDIS compliant files.</p>

        <livewire:datafiles-table />

    </div>

    <div>

        <x-dialog-modal wire:model="showingModal" class="flex items-center" maxWidth="2xl">

            <x-slot name="title">
                {{ $modalTitle }}
            </x-slot>

            <x-slot name="content">

                <form class="max-w-xl mx-auto" wire:submit.prevent='store'>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-5">
                            <x-label for="name" value="name" />
                            <x-input type="text" wire:model="name" name="name" class="block w-full"/>
                            <x-input-error for="name"  class="block w-full"/>
                        </div>
                        <div class="mb-5">
                            <x-label for="supplier" value="supplier" />
                            <x-input type="text" wire:model="supplier" name="supplier"  class="block w-full"/>
                            <x-input-error for="supplier"  class="block w-full"/>
                        </div>
                    </div>
            </x-slot>

            <x-slot name="footer">
                <x-button type="submit">
                    {{ __('Save') }}
                </x-button>
                <x-secondary-button wire:click="$set('showingModal', false)" wire:loading.attr="disabled">
                    {{ __('Cancel')  }}
                </x-secondary-button>

                </form>

            </x-slot>


        </x-dialog-modal>



    </div>

</div>

