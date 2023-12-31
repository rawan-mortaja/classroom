@extends('layout.master')

@section('title', 'Create Classwork')
@section('content')
    <div class="container">
        <h2>{{ $classroom->name }}</h2>
        <h4>Create Classwork</h4>
        <hr>
        <form action="{{ route('classrooms.classworks.store', [$classroom->id, 'type' => $type]) }}" method="POST">
            @csrf
            @include('classworks._form')
            <hr>
            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>

@endsection
