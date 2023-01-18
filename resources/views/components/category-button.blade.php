@props(['category'])

<a href="/{{app()->getLocale()}}/?category={{ $category->slug }}"
   class="px-3 py-1  rounded-full text-xs text-blue-450 font-semibold"
   style="opacity: 0.8; border: 1px solid rgb(255, 179, 0);"
>{{ Str::limit(__("$category->name"),8) }}</a>
