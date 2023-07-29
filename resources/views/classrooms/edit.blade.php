@extends('layout.master')

@section('title', ' Edit Classrooms')

@section('content')
    <div class="container">
        <h1>Edit Classroom</h1>
        <form action="{{ route('classrooms.update', $classroom->id) }}" method="post" enctype="multipart/form-data">
            {{--
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        --}}
            @csrf
            <!-- From Method Sppofing -->
            {{--
        <input type="hidden" name="_method" value="put">
        {{--
         method_field(put)}}
         --}}
            @method('put')

            @include('classrooms._form' , [
                'button_label' => 'Update Classroom'
            ])
        </form>
    </div>
@endsection
