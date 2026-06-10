@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#927860] text-[1.2rem] font-bebas uppercase tracking-wider leading-5 text-[#D1C7B7] focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-[1.2rem] font-bebas uppercase tracking-wider leading-5 text-[#E5E5E5]/70 hover:text-[#D1C7B7] hover:border-[#413B36] focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>