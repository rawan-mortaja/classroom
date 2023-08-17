@extends('layout.master')

@section('title', 'Classrooms')
@section('content')
    @include('classrooms.navbar')
    <div class="container">
        <div class="row p-lg-5">
            <div class="col-md-10">
                <h2>{{ $classroom->name }}</h2>
                <h3>{{ $classroom->section }}</h3>
            </div>
            <div class="col-md-2">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn  btn-dark btn-group-lg " type="button"
                        href="{{ route('classrooms.edit', $classroom->id) }}">Edit Classroom</a>
                </div>
            </div>
            <div class="chart">
                @if ($classroom->cover_image_path)
                    <img src="{{ asset('storage/' . $classroom->cover_image_path) }}" class="card-img-top"
                        style=" display: block; box-sizing: border-box; height: 200px; width: 100%; border-radius: 10px ; margin-bottom: 20px"
                        alt="Classroom Cover Image">
                @else
                    <img src="https://placehold.co/800x300" class="card-img-top">
                @endif

            </div>

            <div class="col-md-3">
                <div class="border rounded p-3 text-center mb-3">
                    <span class="text-success fs-3 ">{{ $classroom->code }}</span>
                </div>
                <div class="border rounded p-3 text-center ">
                    <p> <span class="text-success fs-5 text-bold">Join Classroom</span> <br>
                        <a href="{{ $invitation_link }}">Check here</a></p>
                </div>
            </div>
            <div class="col-md-9">



            </div>
        </div>
    </div>
@endsection
