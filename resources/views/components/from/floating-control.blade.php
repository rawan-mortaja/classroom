<div class="form-floating mb-3">
    {{ $slot }}
    {{-- {{ $label }} --}}
    <label for="{{ $name }}">{{ $placeholder }}</label>
    <x-from.input-errors name="{{ $name }}" />
</div>
