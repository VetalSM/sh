<x-layout>
    <x-setting heading="Publish New Price">
        <form method="POST" action="/admin/products/price" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name" :value="old('name', $price->name)" required />
            <x-form.input name="weight" :value="old('weight', $price->weight)" required />
            <x-form.input name="unit" :value="old('unit', $price->unit)" required />
            <x-form.input name="price" :value="old('price', $price->price)" required />
            <x-form.input name="currency" :value="old('currency', $price->currency)" required />
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
