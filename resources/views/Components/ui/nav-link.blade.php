@props(['active' => false])

<a class="{{ $active ? 'underline text-gray-400':'text-white hover:text-gray-300'}}"
aria-current="{{ $active ? 'page': 'false' }}"
{{ $attributes }}>
{{ $slot }}
</a>