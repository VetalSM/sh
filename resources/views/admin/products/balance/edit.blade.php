<x-layout>
    <x-setting :heading="'Edit Balance: ' . $balanceProduct->name">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products/balance_products/{{ $balanceProduct->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <p  class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6" >приход</p>
            <input type="number" placeholder="сколько пришло" name="count" value="{{old('count')}}" class="border  text-2xl lg:text-base border-gray-200  p-2 w-full rounded" />
{{--            <x-form.input name="count" :value="old('name', $balanceProduct->count)" required />--}}
            <x-form.input name="unit" :value="old('name', $balanceProduct->unit)"  />
            <x-form.input name="expected" :value="old('name', $balanceProduct->expected)"  />

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
