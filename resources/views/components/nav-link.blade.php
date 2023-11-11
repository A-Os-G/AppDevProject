@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 hover:border-b-2 text-s rounded text-sm font-medium leading-5 text-m focus:outline-none focus:border-s transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 hover:border-b-2 rounded text-sm font-medium leading-5 text-s focus:outline-none focus:text-white focus:border-s transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
