@extends('layout.master')

@section('title' , 'Create Topics' )
@section('content')
<div class="container p-lg-5">
    <h2>Create Topics</h2>
    <form action="{{ route('topics.store') }}" method="post">
        {{--
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        --}}
        @csrf
     @include('topics._form')
    <br>

        <button type="submit" class="btn btn-primary">Create Topic</button>
</div>
</form>
</div>
@endsection
