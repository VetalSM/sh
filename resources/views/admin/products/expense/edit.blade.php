@php
    $result=[];
        foreach (\App\Models\Price::all() as $pric_e){
             $result[]= $pric_e->name;
        }
 $result=array_unique($result);
@endphp
<x-layout>
    <x-setting :heading="'Edit Expense: ' . $expense->price_name">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products/expense/{{ $expense->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <x-form.field>
                    <x-form.label name="status"/>
                    <select  name="status" required>
                        <option selected>{{old('status', $expense->status)}}</option>
                        <option value="4">active</option>
                        <option value="2">new</option>
                        <option value="1">promotion</option>
                        <option value="7">out</option>
                        <option value="3">hit</option>
                        <option value="6">expect</option>
                        <option value="5">ends</option>
                        <option value="8">not_available</option>
                    </select>
                    <x-form.error name="status"/>
                </x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $expense->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            <x-form.field>
                <x-form.label name="price"/>
                <select name="price_name" id="price_name" required>

                    @foreach ($result as $price)
                        <option
                            value="{{ $price }}"
                            {{ old('price_name', $expense->price_name) == $price ? 'selected' : '' }}
                        >{{ ucwords($price) }}</option>
                    @endforeach
                </select>
                <x-form.error name="prom_prices"/>
            </x-form.field>
            <hr>
            <div class="mt-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="weight"
                >
                    {{ ucwords('Вес или шт') }}
                </label>
                <input class="border border-gray-200 p-2 w-full rounded"
                       name="weight"
                       id="weight"
                       value="{{ old('weight', $expense->weight) }}" required>
                <x-form.error name="weight"/>
            </div>
            <hr>

            <div class="mt-6 flex">
                <div class="col">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="cost"
                    >
                        {{ ucwords('Общая себестоимость %') }}
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           name="cost"
                           id="cost"
                           value="{{ $expense->cost }}" required>
                    <x-form.error name="cost"/>
                </div>
                <div class="col">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="packaging"
                    >
                        {{ ucwords('Упаковка %') }}
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           name="packaging"
                           id="packaging"
                           value="{{ old('packaging', $expense->packaging) }}" required>
                    <x-form.error name="packaging"/>

                </div>
            </div>

            <hr>
            <div class="mt-6 flex">
                <div class="col">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="expenses"
                    >
                        {{ ucwords('Расходы %') }}
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           name="expenses"
                           id="expenses"
                           value="{{ old('expenses', $expense->expenses) }}" required>
                    <x-form.error name="expenses"/>
                </div>

                <div class="col">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="admin_expenses"
                    >
                        {{ ucwords('Админ расходы %') }}
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           name="admin_expenses"
                           id="admin_expenses"
                           value="{{ old('admin_expenses', $expense->admin_expenses) }}" required>
                    <x-form.error name="admin_expenses"/>

                </div>
            </div>


            <div class="mt-6 flex">
                <div class="col">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="other_expenses"
                    >
                        {{ ucwords('Другие расходы %') }}
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           name="other_expenses"
                           id="other_expenses"
                           value="{{ old('other_expenses', $expense->other_expenses) }}" required>
                    <x-form.error name="other_expenses"/>
                </div>

                <div class="col">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="tax"
                    >
                        {{ ucwords('tax %') }}
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           name="tax"
                           id="tax"
                           value="{{ old('tax', $expense->tax) }}" required>
                    <x-form.error name="tax"/>

                </div>
            </div>

            <div class="mt-6 flex">
                <div class="col">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="travel"
                    >
                        {{ ucwords('Дорога %') }}
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           name="travel"
                           id="travel"
                           value="{{ old('travel', $expense->travel) }}" required>
                    <x-form.error name="travel"/>
                </div>

                <div class="col">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="advertising"
                    >
                        {{ ucwords('Реклама %') }}
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           name="advertising"
                           id="advertising"
                           value="{{ old('advertising', $expense->advertising) }}" required>
                    <x-form.error name="advertising"/>

                </div>
            </div>


            <hr>
            <x-form.input name="profit" :value="old('profit', $expense->profit)" required />
            <x-form.error name="profit"/>
{{--            <x-form.input name="currency" :value="old('currency', $expense->currency)" required />--}}
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
