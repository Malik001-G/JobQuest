@php
$classes ='p-4 bg-white/5 rounded-xl border border-transparent transition-all duration-500 ease-out
hover:border-blue-800 group'
@endphp

<div {{ $attributes(['class'=> $classes])}}>
    {{$slot}}
</div>