@props(['messages'])
@php
    $name = str_replace('[', '.', $name);
    $name = str_replace(']', '', $name);
@endphp

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
