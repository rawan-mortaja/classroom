@extends('layout.master')

@section('title', 'Update Classwork')
@section('content')
    <div class="container">
        <h2>{{ $classroom->name }}</h2>
        <h4>Update Classwork</h4>
        <x-alert name="success" class="alert-success" />
        <x-alert name="error" class="alert-danger" />
        <hr>
        <form action="{{ route('classrooms.classworks.update', [$classroom->id, $classwork->id]) }}"
            method="POST">
            @csrf
            @method('put')
            @include('classworks._form')
            <hr>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>

@endsection
