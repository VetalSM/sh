<x-layout>
    <x-setting :heading="'Edit Price: ' . $price->name">
        <form method="POST" action="/admin/products/price/{{ $price->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name', $price->name)" required />
            <x-form.input name="weight" :value="old('weight', $price->weight)" required />
            <x-form.input name="unit" :value="old('unit', $price->unit)" required />
            <x-form.input name="price" :value="old('price', $price->price)" required />
            <x-form.input name="currency" :value="old('currency', $price->currency)" required />
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
