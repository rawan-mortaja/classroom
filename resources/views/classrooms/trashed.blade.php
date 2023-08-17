@extends('layout.master')

@section('title', 'Classrooms')

@section('content')

    {{-- <x-main-layout title="Trashed Classrooms"> --}}


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
            <br>
        </div>
        @foreach ($classroom as $classrooms)
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n5 mx-4 z-index-2 bg-transparent">
                        <div class="bg-light shadow-primary border-radius-lg  pe-1">
                                @if ($classrooms->cover_image_path)
                                    <img src="{{ asset('storage/' . $classrooms->cover_image_path) }}" class="card-img-top"
                                    style=" display: block; box-sizing: border-box; height: 200px; width: 360.7px;" alt="Classroom Cover Image">
                                @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-0 ">{{ $classrooms->name }}</h4>
                        <p class="text-sm ">{{ $classrooms->section }}-{{ $classrooms->room }}</p>
                        <hr class="dark horizontal">
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
@endsection

{{-- </x-main-layout> --}}

@pushIf(false , 'scripts')
<script>
    console.log('@@stack')
</script>
@endpushIf
