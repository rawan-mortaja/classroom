@props(['name'])
{{-- @php
    $class = $name == 'error' ? 'danger' : 'success';
@endphp --}}

@if (session()->has($name))
    {{-- <div class="alert alert-{{ $class }}" role="alert" {{ $attributes }}> --}}
    <div
        {{ $attributes->class(['alert']) // & 'alert-success' => $name == 'success'
        ->merge([
            'id' => 'x',
        ]) }}>
        {{ session($name) }}
    </div>
@endif
