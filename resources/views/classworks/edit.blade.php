@extends('layout.master')

@section('title', 'Update Classwork')
@section('content')
    <div class="container">
        <h1>{{ $classroom->name }} (#{{ $classroom->id }})</h1>
        <h3>Update Classwork</h3>
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
