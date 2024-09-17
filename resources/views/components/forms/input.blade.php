@props(['label', 'name'])

@php
$defaults = [
'type' => 'text',
'id' => $name,
'name' => $name,
'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full outline-none focus:ring-1 focus:ring-gray-300
transition-all duration-700 ease-out',
'value' => old($name)
];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>