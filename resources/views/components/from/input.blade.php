@props([
    'type' => 'text',
    'value' => '',
    'name',
])
<input
    type="{{ $type }}"
    value="{{ old($name, $value) }}"
    name="{{ $name }}"
    id="{{ $id ?? $name }}"
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>
