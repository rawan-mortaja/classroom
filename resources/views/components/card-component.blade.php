@props([
    'classroom', //object,
])

<div class="col-3 mb-4">
    <div class="card" style="width: 18rem;">
        {{-- <img src="{{  $classroom->cover_image_path }}" class="card-img-top"
        style="height: 100px; object-fit: cover" alt="Classroom Cover Image"> --}}
        @if ($classroom->cover_image_path)
            <img src="{{ asset('storage/' . $classroom->cover_image_path) }}" class="card-img-top"
                style="height: 100px; object-fit: cover" alt="Classroom Cover Image">
        @else
            <img src="https://placehold.co/800x300" class="card-img-top">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $classroom->name }}</h5>
            <p class="card-text">{{ $classroom->section }}-{{ $classroom->room }}</p>

            <div class="text-center d-flex justify-content-between">
                <a href="{{ $classroom->url }}" class="btn btn-primary btn-sm mr-2">View</a>

                <a href="{{ route('classrooms.edit', $classroom->id) }}"
                    class="btn btn-success btn-sm text-white mr-2">Update</a>

                <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm text-white"
                        onclick="return confirm('Are you sure')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
