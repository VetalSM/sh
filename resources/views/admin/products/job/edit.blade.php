
<x-layout>

    <x-setting :heading="'Edit Product: ' . $status->name">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products/status_jobs/{{ $status->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @php
                $result=[];
                    foreach (\App\Models\Price::all() as $pric_e){
                         $result[]= $pric_e->name;
                    }
             $result=array_unique($result);
            @endphp
            <x-form.label name="product"/>
            <select name="product_id"  required>
                <option class="rounded-full"
                        value="{{$status->product_id}}" >{{$status->product_name}}</option>

            @foreach (\App\Models\Product::all() as $product)
                    <option class="rounded-full"
                            value="{{$product->id}}" >{{$product->title}} <br>текущий прайс<<{{$product->prices}}>> </option>
                @endforeach
            </select>
            <x-form.label name="price start"/>
            <select name="price_start_name"  required>
                <option class="rounded-full" selected>{{old('price_start_name', $status->price_start_name)}}</option>

            @foreach ($result as $price)
                    <option class="rounded-full"
                            value="{{$price}}" >{{$price}}</option>

                @endforeach
            </select>

            <x-form.label name="price end"/>
            <select name="price_end_name"  required>
                <option class="rounded-full" selected>{{old('price_end_name', $status->price_end_name)}}</option>

            @foreach ($result as $price)
                    <option class="rounded-full"
                            value="{{$price}}" >{{$price}}</option>

                @endforeach
            </select>

            <x-form.label name="status start"/>
            <select  name="status_start" required>
                @if( $status->status_start == "0")
                    <option value="0" selected></option>
                @elseif( $status->status_start == "1")
                    <option value="1" selected>{{old('status_start', 'promotion')}}</option>
                @elseif($status->status_start == "2")
                    <option  value="2" selected>{{old('status_start', 'new')}}</option>
                @elseif($status->status_start == "3")
                    <option value="3" selected>{{old('status_start', 'hit')}}</option>
                @elseif($status->status_start == "4")
                    <option value="4" selected>{{old('status_start', 'active')}}</option>
                @elseif($status->status_start == "5")
                    <option value="5" selected>{{old('status_start', 'ends')}}</option>
                @elseif($status->status_start == "6")
                    <option value="6" selected>{{old('status_start', 'expect')}}</option>
                @elseif($status->status_start == "7")
                    <option  value="7" selected>{{old('status_start', 'out')}}</option>
                @elseif($status->status_start == "8")
                    <option value="8" selected>{{old('status_start', 'not_available')}}</option>
                @endif
                <option value="1">promotion</option>
                <option value="2">new</option>
                <option value="3">hit</option>
                <option value="4">active</option>
                <option value="5">ends</option>
                <option value="6">expect</option>
                <option value="7">out</option>
                <option value="8">not_available</option>
            </select>
            <x-form.label name="status end"/>
            <select  name="status_end" required>
                    @if( $status->status_end == "0")
                    <option value="0" selected></option>
                    @elseif( $status->status_end == "1")
                    <option value="1" selected>{{old('status_end', 'promotion')}}</option>
                    @elseif($status->status_end == "2")
                    <option value="2" selected>{{old('status_end', 'new')}}</option>
                    @elseif($status->status_end == "3")
                    <option value="3" selected>{{old('status_end', 'hit')}}</option>
                    @elseif($status->status_end == "4")
                    <option value="4" selected>{{old('status_end', 'active')}}</option>
                    @elseif($status->status_end == "5")
                    <option value="5" selected>{{old('status_end', 'ends')}}</option>
                    @elseif($status->status_end == "6")
                    <option value="6" selected>{{old('status_end', 'expect')}}</option>
                    @elseif($status->status_end == "7")
                    <option value="7" selected>{{old('status_end', 'out')}}</option>
                    @elseif($status->status_end == "8")
                    <option value="8" selected>{{old('status_end', 'not_available')}}</option>
                @endif
                    <option value="1">promotion</option>
                    <option value="2">new</option>
                    <option value="3">hit</option>
                    <option value="4">active</option>
                    <option value="5">ends</option>
                    <option value="6">expect</option>
                    <option value="7">out</option>
                    <option value="8">not_available</option>
            </select>

            <x-form.label name="start date"/>
            <input name="start_date" type="datetime-local"  value="{{$status->start_date}}"/>
            <x-form.label name="end date"/>
            <input name="end_date" type="datetime-local"  value="{{$status->end_date}}"/>

            <x-form.button>Create</x-form.button>
        </form>
    </x-setting>
</x-layout>
