@extends('layout.master')

@section('title' , 'Topics' )
@section('content')
<div class="container">
    <h1>{{ $topic->name}} (#{{ $topic->id}})</h1>

    <div class="row">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-group-lg " type="button" href="{{ route('topics.index')}}">Topics</a>
            <a class="btn  btn-dark btn-group-lg " type="button" href="{{route('topics.edit' , $topic->id)}}">Edit Topic</a>
        </div>
        <div class="col-md-3">

            <p class="card-text">Classroom ID :{{ $topic->classroom_id }}</p>
            <p class="card-text">User ID :{{ $topic->user_id }}</p>
        </div>
        <div class="col-md-9">

        </div>
    </div>
</div>
@endsection