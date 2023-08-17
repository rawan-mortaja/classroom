@props([
    'value' => '',
    'name',
    'id',
])
@php
    $old_name = str_replace('[', '.', $name);
    $old_name = str_replace(']', '', $old_name);
    // echo $type , $name
@endphp
<input value="{{ old($old_name, $value) }}" name="{{ $name }}" id="{{ $id ?? $name }}"
    {{ $attributes->merge([
        'type' => 'text',
    ])
    ->class(['form-control', 'is-invalid' => $errors->has($old_name)]) }}>
