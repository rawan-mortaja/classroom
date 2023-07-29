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

                            <div class="text-center d-flex justify-content-between ">

                                <form action="{{ route('topics.restore', $topic->id) }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-success btn-sm text-white"
                                        onclick="return confirm('Are you sure')">Restore</button>
                                </form>

                                <form action="{{ route('topics.force-delete', $topic->id) }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm text-white"
                                        onclick="return confirm('Are you sure')">Delete Forever</button>
                                </form>

                            </div>
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
