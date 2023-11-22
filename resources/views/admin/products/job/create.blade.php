<x-layout>
    <x-setting heading="Publish New Product">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products/status_jobs" enctype="multipart/form-data">
            @csrf
            @php
                $result=[];
                    foreach (\App\Models\Price::all() as $pric_e){
                         $result[]= $pric_e->name;
                    }
             $result=array_unique($result);
            @endphp
            <x-form.label name="product"/>
            <select name="product_id"  required>
                @foreach (\App\Models\Product::all() as $product)
                    <option class="rounded-full"
                            value="{{$product->id}}" >{{$product->title}} << прайс:::{{$product->prices ?? null}}>>
                        << акция:::{{$product->prom_prices ?? null}}>> </option>
                @endforeach
            </select>
            <x-form.label name="change price in status"/>
            <select name="price_status"  required>
                <option class="rounded-full" value="prom" >prom</option>
                <option class="rounded-full" value="active" >active</option>
            </select>
            <x-form.label name="price start"/>
            <select name="price_start_name"  required>
                @foreach ($result as $price)

                    <option class="rounded-full"
                            value="{{$price}}" >{{$price}}</option>

                @endforeach
            </select>
            <x-form.label name="price end"/>
            <select name="price_end_name"  required>
                @foreach ($result as $price)
                    <option class="rounded-full"
                            value="{{$price}}" >{{$price}}</option>

                @endforeach
            </select>

            <x-form.label name="status start"/>
            <select  name="status_start" required>
                <option value="0" selected></option>
                <option value="4">active</option>
                <option value="2">new</option>
                <option value="1">promotion</option>
                <option value="7">out</option>
                <option value="3">hit</option>
                <option value="6">expect</option>
                <option value="5">ends</option>
                <option value="8">not_available</option>
            </select>
            <x-form.label name="status end"/>
            <select  name="status_end" required>
                <option value="0" selected></option>
                <option value="4">active</option>
                <option value="2">new</option>
                <option value="1">promotion</option>
                <option value="7">out</option>
                <option value="3">hit</option>
                <option value="6">expect</option>
                <option value="5">ends</option>
                <option value="8">not_available</option>
            </select>

            <x-form.label name="start date"/>
            <input name="start_date" type="datetime-local" />
            <x-form.label name="end date"/>
            <input name="end_date" type="datetime-local"  />
            <input name="product_name" type="hidden" />
            <x-form.button>Create</x-form.button>
        </form>
    </x-setting>
</x-layout>
