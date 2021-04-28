@props(['class'])

<img {{ $attributes->merge(['class' => $class]) }} src="{{ asset('aylopride.svg') }}"></img>