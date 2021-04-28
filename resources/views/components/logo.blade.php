@props(['class'])

@if(now()->month == 6)
    <img {{ $attributes->merge(['class' => $class]) }} src="{{ asset('aylopride.svg') }}"></img>
@else
    <img {{ $attributes->merge(['class' => $class]) }} src="{{ asset('aylo.svg') }}"></img>
@endif