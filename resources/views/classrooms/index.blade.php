@extends('layout.master')

@section('title', 'Classrooms')

@section('content')

    {{-- <x-main-layout title="Classrooms"> --}}
    <div class="container">
        <h1> Classrooms</h1>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session()->has('error'))
            <x-alert name="error" id="error" class="alert-danger" />
        @endif
        <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-group-lg " type="button" href="{{ route('classrooms.create') }}">Create
                    Classroom</a>
                <a class="btn btn-danger btn-group-lg " type="button" href="{{ route('classrooms.trashed') }}">Trashed
                    Classroom</a>
            </div>
            <div>
                <br>
            </div>
            @foreach ($classrooms as $classroom)
                <x-card-component :classroom="$classroom" />
            @endforeach
        </div>
    </div>
    {{-- @endif --}}
@endsection

{{-- </x-main-layout> --}}

@pushIf(false , 'scripts')
<script>
    console.log('@@stack')
</script>
@endpushIf
