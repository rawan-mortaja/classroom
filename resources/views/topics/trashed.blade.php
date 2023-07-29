@extends('layout.master')

@section('title', 'Topics')
@section('content')
    <div class="container">
        <h1>Trashed Topics</h1>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            @foreach ($topics as $topic)
                <div class="col-md-4">
                    <div class="card">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $topic->name }}</h5>
                            <a href="{{ route('topics.store', $topic->id) }}" class="btn btn-sm btn-dark">Store</a>
                            <form action="{{ route('topics.destroy', $topic->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@pushIf(false , 'scripts')
<script>
    console.log('@@stack')
</script>
@endpushIf
