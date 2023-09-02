@extends('layout.master')

@section('title', 'Classrooms')
@section('content')
    @include('classrooms.navbar')
    <div class="container">
        <div class="row p-lg-5">
            <div class="chart">
                @if ($classroom->cover_image_path)
                    <img src="{{ asset('storage/' . $classroom->cover_image_path) }}" class="card-img-top"
                        style=" display: block; box-sizing: border-box; height: 200px; width: 100%; border-radius: 10px ; margin-bottom: 20px"
                        alt="Classroom Cover Image">
                @else
                    <img src="https://placehold.co/800x300" class="card-img-top">
                @endif
                <div class="row ">
                    <div class="col-md-10">
                        <h4 style="position: absolute; bottom:380px;left:370px; z-index:1;color: white;">
                            {{ $classroom->name }} / {{ $classroom->section }}</h4>
                    </div>
                    <div class="col-md-2 position-absolute">
                        {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn  btn-dark btn-group-lg " type="button"
                                href="{{ route('classrooms.edit', $classroom->id) }}">Edit Classroom</a>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="border rounded p-3 text-center mb-3">
                    <span class="text-success fs-3 ">{{ $classroom->code }}</span>
                </div>
                <div class="border rounded p-3 text-center ">
                    <p> <span class="text-success fs-5 text-bold">Join Classroom</span> <br>
                        <a href="{{ $invitation_link }}">Check here</a>
                    </p>
                </div>
            </div>
            <div class="col-md-9">
                @foreach ($classroom->stream as $stream)
                    <div class="card card-background-mask-light align-items-start mt-4 p-2">
                        <a href="{{ $stream->link}}">
                            <h6 class="card-text flex-1 m-3 " style="bold">
                                <i class="fa fa-file-text badge-primary" aria-hidden="true" style="margin-right: 10px;"></i>
                                {{ $stream->content }}
                                <h6>
                        </a>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
    </div>
@endsection
