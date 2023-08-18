@props([
    'classroom', //object,
])

<div class="col-md-3 mt-4 mb-4">
    <div class="card z-index-2 ">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2 bg-transparent">
            <div class="bg-light shadow-primary border-radius-lg  pe-1">
                <div class="chart">
                    {{-- <canvas id="chart-bars" class="chart-canvas" height="212"
                        style="display: block; box-sizing: border-box; height: 170px; width: 360.7px;"
                        width="450"> --}}
                    @if ($classroom->cover_image_path)
                        <img src="{{ asset('storage/' . $classroom->cover_image_path) }}" class="card-img-top"
                            style=" display: block; box-sizing: border-box; height: 200px; width: 260px;"
                         alt="Classroom Cover Image">
                    @else
                        <img src="https://placehold.co/800x300" class="card-img-top">
                    @endif
                    {{-- </canvas> --}}

                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="mb-0 ">{{ $classroom->name }}</h4>
            <p class="text-sm ">{{ $classroom->section }}-{{ $classroom->room }}</p>
            <hr class="dark horizontal">
            <div class="d-flex text-center justify-content-between ">
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
