{{-- <div class="form-floating mb-3"> --}}
<div class="input-group input-group-outline is-valid my-3">

    <x-alert name="error" id="error" class="alert-danger" />
    <x-from.floating-control name="name" placeholder="Classroom Name">
        {{-- <x-slot:label>
        <label for="name">Classroom Name</label>
    </x-slot:label> --}}
        <x-from.input name="name" class="form-control-lg" value="{{ $classroom->name }}" placeholder="Class Name" />
        {{-- <input type="text" value="" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name"
        name="name" placeholder="Class Name"> --}}
        {{-- <label for="name">Calssroom Name</label>
    <x-from.input-errors name="name" /> --}}
        {{-- @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
        {{-- </div> --}}
    </x-from.floating-control>
</div>
<div class="input-group input-group-outline is-valid my-3">
    <x-from.floating-control name="section" placeholder="Section">
        <x-from.input name="section" class="form-control-lg" value="{{ $classroom->section }}" placeholder="Section" />
    </x-from.floating-control>
</div>
<div class="input-group input-group-outline is-valid my-3">
<x-from.floating-control name="subject" placeholder="Subject">
    <x-from.input name="subject" class="form-control-lg" value="{{ $classroom->subject }}" placeholder="Subject" />
</x-from.floating-control>
</div>
<div class="input-group input-group-outline is-valid my-3">
<x-from.floating-control name="room" placeholder="Room">
    <x-from.input name="room" class="form-control-lg" value="{{ $classroom->room }}" placeholder="Room" />
</x-from.floating-control>
</div>
<div class="input-group input-group-dynamic mb-4">
<x-from.floating-control name="cover_image" placeholder="Cover Image">
    @if ($classroom->cover_image_path)
        <img src="{{ Storage::disk('public')->url($classroom->cover_image_path) }}" alt="">
    @endif
    <x-from.input type="file" class="form-control-lg" name="cover_image" value="{{ $classroom->image }}"
        placeholder="Cover Image" />
</x-from.floating-control>
</div>
<button type="submit" class="btn btn-primary">{{ $button_label }}</button>
