{{-- @extends('layout.master')

@section('title', 'Classrooms')

@section('content') --}}

<x-main-layout title="Trashed Classrooms">


    <div class="container">
        <h1>Trashed Classrooms</h1>

        <x-alert name="success" id="success" class="alert-success" />
        {{-- <x-alert name="error"  id="error" class="alert-danger"/> --}}
        {{-- @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success')}}
    </div>
    @endif --}}
        <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-group-lg " type="button" href="{{ route('classrooms.create') }}">Create
                    Classroom</a>
            </div>
            <div>
                <br>
            </div>
            @foreach ($classroom as $classrooms)
                <div class="col-3 mb-4">
                    <div class="card" style="width: 18rem;">
                        @if ($classrooms->cover_image_path)
                            <img src="{{ asset('storage/' . $classrooms->cover_image_path) }}" class="card-img-top"
                                style="height: 100px; object-fit: cover" alt="Classroom Cover Image">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $classrooms->name }}</h5>
                            <p class="card-text">{{ $classrooms->section }}-{{ $classrooms->room }}</p>

                            <div class="text-center d-flex justify-content-between ">

                                <form action="{{ route('classrooms.restore', $classrooms->id) }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-success btn-sm text-white"
                                        onclick="return confirm('Are you sure')">Restore</button>
                                </form>

                                <form action="{{ route('classrooms.forcedelete', $classrooms->id) }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm text-white"
                                        onclick="return confirm('Are you sure')">Delete Forever</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- @endsection --}}

</x-main-layout>

@pushIf(false , 'scripts')
<script>
    console.log('@@stack')
</script>
@endpushIf
