@extends('layout.master')

@section('title', 'Classrooms')
@section('content')
    <ul class="nav justify-content-center nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('classrooms.show', $classroom->id) }}">Stream</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('classrooms.classworks.index', $classroom->id) }}">Classworks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('classrooms.people', $classroom->id) }}">Peoples</a>
        </li>
        {{-- <li class="nav-item">
      <a class="nav-link disabled" aria-disabled="true">Grades</a>
    </li> --}}
    </ul>
    <br>

    <div class="container">

        <br>
        <h1>{{ $classroom->name }} (#{{ $classroom->id }})</h1>
        <h3>{{ $classroom->section }}</h3>

        <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-group-lg " type="button"
                    href="{{ route('classrooms.index') }}">Classrooms</a>
                <a class="btn  btn-dark btn-group-lg " type="button"
                    href="{{ route('classrooms.edit', $classroom->id) }}">Edit Classroom</a>
            </div>
            <div class="col-md-3">
                <div class="border  rounded p-3 text-center">
                    <span class="text-success fs-3 ">{{ $classroom->code }}</span>
                </div>
            </div>
            <div class="col-md-9">

                <p>Invitation Link : <a href="{{ $invitation_link }}">{{ $invitation_link }}</a></p>

            </div>
        </div>
    </div>
@endsection
