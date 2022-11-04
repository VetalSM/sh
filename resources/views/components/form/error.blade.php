@props(['name'])

@error($name)

@if($name === 'tel')
    <p class="text-red-500 text-4xl lg:text-sm mt-2">{{$message = 'Невірний формат номеру телефона! Приклад: +380...'}}</p>
    @elseif($name === 'email')
        <p class="text-red-500 text-4xl lg:text-sm mt-2">{{$message = 'Невірний email або password'}}</p>
@else
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@endif
@enderror
