<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('coffee.sales.create') }}" class="w-full max-w-lg">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 gap-y-0.5">
                                    <!-- Quantity -->
                                    <div>
                                        <x-label for="quantity" :value="__('Quantity')" />
                                        <x-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" 
                                        value="" required autofocus onfocusout="calculateSellingPrice()"/>
                                    </div>
                            </div>
                            <div class="w-full md:w-1/2 px-3 m-5">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    <!-- Unit Cost -->
                                    <div>
                                        <x-label for="unit_cost" :value="__('Unit Cost (£)')" />
                                        <x-input id="unit_cost" class="block mt-1 w-full" type="text" 
                                        name="unit_cost" value="" required onfocusout="calculateSellingPrice()"/>
                                    </div>
                                </label>
                            </div>

                            <div class="w-full md:w-1/2 px-3">
                                <!-- Selling Price -->
                                <div>
                                    <x-label for="selling_price" :value="__('Selling Price')" />
                                    <x-input id="selling_price" disabled="disabled" class="block mt-1 w-full" type="text" name="selling_price" value=""  />
                                </div>
                            </div>
                            
                            <div class="w-full md:w-1/2 px-3">
                                <!-- Record Sale Button -->
                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-3">
                                        {{ __('Record Sale') }}
                                    </x-button>
                                </div>
                            </div>  
                        </div>
                    </form>
                </div>           
                @include('sales_records')
            </div>
        </div>
    </div>
</x-app-layout>
