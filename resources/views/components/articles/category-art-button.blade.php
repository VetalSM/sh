@props(['category'])

<a href="/{{app()->getLocale()}}/articles/?category={{ $category->slug }}"
   class=" transition-colors  text-sm duration-300 px-3 py-1
   font-semibold bg-gray-100 hover:bg-gray-300 rounded-full "
   style="opacity: 0.8;  rgb(121, 227, 27);"
>{{ Str::limit(__("$category->name"),8) }}</a>
