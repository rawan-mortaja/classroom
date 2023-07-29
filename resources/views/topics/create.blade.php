@extends('layout.master')

@section('title' , 'Create Topics' )
@section('content')
<div class="container">
    <h1>Create Topics</h1>
    <form action="{{ route('topics.store') }}" method="post">
        {{--
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        --}}
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="Class Name">
            <label for="name">Topic Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="classroom_id" name="classroom_id" placeholder="Classroom ID">
            <label for="room">Classroom ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID">
            <label for="room">User ID</label>
        </div>
        <button type="submit" class="btn btn-primary">Create Topic</button>
</div>
</form>
</div>
@endsection