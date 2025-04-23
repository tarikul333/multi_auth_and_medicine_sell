@props(['active' => false])

<a 
    class="{{ $active 
        ? 'bg-gray-900 text-gray-100 font-semibold px-4 py-2 rounded transition' 
        : 'text-white hover:bg-gray-700 hover:text-gray-200 px-4 py-2 rounded transition' 
    }}" 
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}
>
    {{ $slot }}
</a>
