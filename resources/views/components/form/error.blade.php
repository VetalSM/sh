@props(['name'])

@error($name)

@if($name === 'tel')
    <p class="text-red-500  mt-2">{{$message = __("Невірний формат номеру телефона! Приклад: +380...")}}</p>
@else
    <p class="text-red-500  mt-2">{{ $message }}</p>
@endif
@enderror
