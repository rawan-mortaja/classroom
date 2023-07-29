@extends('layout.master')

@section('title' , ' Edit Topics' )

@section('content')
<div class="container">
    <h1>Edit Topic</h1>
    <form action="{{ route('topics.update' , $topic->id) }}" method="post">
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
       {{-- {{ csrf_field() }}
      
        @csrf
          --}}
        <!-- From Method Sppofing -->
       {{--
        <input type="hidden" name="_method" value="put">
        {{--
         method_field(put)}}
         --}}
        @method('put')
       

        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{ $topic->name}}" id="name" name="name" placeholder="Topic Name">
            <label for="name">Topic Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{ $topic->classroom_id}}" id="classroom_id" name="classroom_id" placeholder="Classroom ID">
            <label for="room">Classroom ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control"  value="{{ $topic->user_id}}" id="user_id" name="user_id" placeholder="User ID">
            <label for="room">User ID</label>
        </div>
        <button type="submit" class="btn btn-primary">Update topic</button>
</div>
</form>
</div>
@endsection