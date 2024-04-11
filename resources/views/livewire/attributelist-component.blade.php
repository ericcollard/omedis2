<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @push('pagetitle', 'Attribute Lists')
        @push('breadcrumb')
            @php(
            $breadcrumb_items = [
                        ['title' => 'Attribute Lists', 'url' => route('attribute-lists')],
                    ]
            )
            <livewire:show-breadcrumb :items="$breadcrumb_items" />
        @endpush

        <livewire:attribute-lists-table />

    </div>

    <div>

        <x-dialog-modal wire:model="showingModal" class="flex items-center" maxWidth="2xl">

            <x-slot name="title">
                {{ $modalTitle }}
            </x-slot>

            <x-slot name="content">

                <form class="max-w-xl mx-auto" wire:submit.prevent='store'>

                    <div class="mb-5">
                        <x-label for="name" value="name" />
                        <x-input type="text" wire:model="name" name="name" class="block w-full"/>
                        <x-input-error for="name"  class="block w-full"/>
                    </div>


                    <div class="mb-5">
                        <x-label for="comment" value="comment" />
                        <x-textarea type="text" wire:model="comment" class="block w-full" />
                        <x-input-error for="comment"  class="block w-full"/>
                    </div>

                    @if ($id > 0)
                    <div class="mb-5">
                        <x-label for="samples" value="Sample values" />
                        <x-input disabled type="text" wire:model="samples" name="samples" class="block w-full bg-gray-100"/>

                    </div>
                    @endif

            </x-slot>

            <x-slot name="footer">
                <x-button type="submit" class="mr-1">
                    {{ __('Save') }}
                </x-button>
                <x-secondary-button  class="mr-1" wire:click="$set('showingModal', false)" wire:loading.attr="disabled">
                    {{ __('Cancel')  }}
                </x-secondary-button>

                </form>

                <x-button wire:click="$dispatch('list-of-values',{ id: {{ $id }} } )" wire:loading.attr="disabled">
                    Update list of values
                </x-button>

            </x-slot>


        </x-dialog-modal>



    </div>

</div>

