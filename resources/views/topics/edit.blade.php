@extends('layout.master')

@section('title', ' Edit Topics')

@section('content')
    <div class="container p-lg-5">
        <h2>Edit Topic</h2>
        <form action="{{ route('topics.update', $topic->id) }}" method="post">

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

            <div class="row">
                <div class="col-md-8">
                    <div class="form-floating mb-3">
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" value="{{ $topic->name }}" id="name"
                                name="name" placeholder="Topic Name">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" value="{{ $topic->classroom_id }}" id="classroom_id"
                                name="classroom_id" placeholder="Classroom ID">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" value="{{ $topic->user_id }}" id="user_id"
                                name="user_id" placeholder="User ID">
                        </div>
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update topic</button>

        </form>
    </div>
@endsection
