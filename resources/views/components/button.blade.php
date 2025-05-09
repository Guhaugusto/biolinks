@props([
'href' => null,
'block' => null,
'soft' => null,
'primary' => null,
'ghost' => null

])

@php

$tag = $href ? 'a' : 'button';

@endphp


<{{ $tag }} {{ $href ? "href=$href" : '' }}

    {{ $attributes->class([
    'btn btn-primary',
    'btn-wide' => $block,
    'btn-soft' => $soft,
    'btn-primary' => $primary,
    'btn-ghost' => $ghost,
    ]) }}>
    {{ $slot }}
</{{ $tag }}>