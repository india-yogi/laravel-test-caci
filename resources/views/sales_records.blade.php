<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Previous Sales') }}
        </h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <x-label for="quantity" :value="__('Quantity')" />
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        <x-label for="unit_cost" :value="__('Unit Cost')" />                      
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        <x-label for="selling_price" :value="__('Selling Price')" />                       
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <label>{{$sale['quantity']}}</label>
                    </th>
                    <td class="px-6 py-4">
                        £<label>{{$sale['unit_cost']}}</label>
                    </td>
                    <td class="px-6 py-4">
                        £<label>{{$sale['selling_price']}}</label>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
</div>