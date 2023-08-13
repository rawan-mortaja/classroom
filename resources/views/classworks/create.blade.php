@extends('layout.master')

@section('title', 'Create Classwork')
@section('content')
    <div class="container">
        <h1>{{ $classroom->name }} (#{{ $classroom->id }})</h1>
        <h3>Create Classwork</h3>
        <hr>
        <form action="{{ route('classrooms.classworks.store', [$classroom->id, 'type' => $type]) }}" method="POST">
            @csrf
            @include('classworks._form')
            <hr>
            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>

@endsection
