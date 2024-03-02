<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @push('pagetitle', 'Attributes')
        @push('breadcrumb')
            @php(
            $breadcrumb_items = [
                        ['title' => 'Attributes', 'url' => '/attributes'],
                    ]
            )
            <livewire:show-breadcrumb :items="$breadcrumb_items" />
        @endpush

        <livewire:attributes-table />

    </div>

    <div>

        <x-dialog-modal wire:model="showingModal" class="flex items-center">

            <x-slot name="title">
                {{ $modalTitle }}
            </x-slot>

            <x-slot name="content">

                <form class="max-w-sm mx-auto" wire:submit.prevent='store'>

                    <div class="mb-5">
                        <x-label for="name" value="name" />
                        <x-input type="text" wire:model="name" name="name" />
                        <x-input-error for="name" />
                    </div>

                    <div class="mb-5">
                        <x-label for="odoo_name" value="odoo_name" />
                        <x-input type="text" wire:model="odoo_name" name="odoo_name" />
                        <x-input-error for="odoo_name" />
                    </div>

                    <div class="mb-5">
                        <x-label for="comment" value="comment" />
                        <x-input type="text" wire:model="comment" name="comment" />
                        <x-input-error for="comment" />
                    </div>

                    <div class="mb-5">
                        <x-label for="required" value="required" />
                        <x-checkbox name="required" wire:model="required" />
                        <x-input-error for="required" />
                    </div>


                    <div class="mb-5">
                        <x-label for="attribute_list_id" value="attribute_list_id" />
                        <select wire:model="attribute_list_id" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm' name="attribute_list_id">
                            <option value="">...</option>
                            @foreach(\App\Models\AttributeList::All() as $item)
                                <option value="{{ $item->id }}"
                                    {{ $attribute_list_id == $item->id ? 'selected' : '' }} >
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="attribute_list_id" />
                    </div>

                    <div class="mb-5">
                        <x-label for="unit_id" value="unit_id" />
                        <select wire:model="unit_id" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm' name="attribute_list_id">
                            <option value="">...</option>
                            @foreach(\App\Models\Unit::All() as $unit)
                                <option value="{{ $unit->id }}">
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="unit_id" />
                    </div>

                    <div class="mb-5">
                        <x-label for="data_type_id" value="data_type_id" />
                        <select wire:model="data_type_id" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm' name="attribute_list_id">
                            <option value="">...</option>
                            @foreach(\App\Models\DataType::All() as $item)
                                <option value="{{ $item->id }}"
                                    {{ $data_type_id == $item->id ? 'selected' : '' }} >
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="data_type_id" />
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

