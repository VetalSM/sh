@props(['category'])

<a href="/?category={{ $category->slug }}"
   class="px-3 py-1 border border-red-800 rounded-full text-blue-450 uppercase font-semibold"

>{{ $category->name }}</a>
