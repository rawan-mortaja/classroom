@extends('layout.master')

@section('title', 'Classworks')
@section('content')
    <div class="top-100">
        <ul class="nav justify-content-center nav-tabs ">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ route('classrooms.show', $classroom->id) }}">Stream</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('classrooms.classworks.index', $classroom->id) }}">Classworks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('classrooms.people', $classroom->id) }}">Peoples</a>
            </li>
            {{-- <li class="nav-item">
      <a class="nav-link disabled" aria-disabled="true">Grades</a>
    </li>
    </ul>
    <br> <br>
    </div>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Google Classroom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('classrooms.show', $classroom->id) }}">Stream</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('classrooms.classworks.index', $classroom->id) }}">Classwork</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('classrooms.people', $classroom->id) }}">People</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Grades</a>
                    </li>
                    <!-- Add more menu items as needed -->
                </ul>
                <!-- Add user profile and settings dropdown here -->
            </div>
        </div>
    </nav> --}}
    </div>

    <div class="container">

        <h1>{{ $classroom->name }} (#{{ $classroom->id }})</h1>
        <h3>Classwork
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    + Create
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item"
                            href="{{ route('classrooms.classworks.create', ['classroom' => $classroom->id, 'type' => 'assignment']) }}">Assignment</a>
                    </li>
                    <li><a class="dropdown-item"
                            href="{{ route('classrooms.classworks.create', ['classroom' => $classroom->id, 'type' => 'question']) }}">Question</a>
                    </li>
                    <li><a class="dropdown-item"
                            href="{{ route('classrooms.classworks.create', ['classroom' => $classroom->id, 'type' => 'material']) }}">Material</a>
                    </li>
                </ul>
            </div>
        </h3>
        <hr>
        <form action="{{ URL::current() }}" method="get">
            <div class="col-12">
                <input type="text" placeholder="search" name="search" class="form-control">
            </div>
            <div class="col-12">
                <button class="btn btn-primary ms-2" type="submit">Find</button>
            </div>
        </form>

        {{-- <a class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                Edit
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item"
                        href="{{ route('classrooms.classworks.edit', ['classroom' => $classroom->id, 'classwork' => $classworks->id, 'type' => 'assignment']) }}">Assignment</a>
                </li>
                <li><a class="dropdown-item"
                        href="{{ route('classrooms.classworks.edit', ['classroom' => $classroom->id, 'type' => 'question']) }}">Question</a>
                </li>
                <li><a class="dropdown-item"
                        href="{{ route('classrooms.classworks.edit', ['classroom' => $classroom->id, 'type' => 'material']) }}">Material</a>
                </li>
            </ul>
        </div> --}}

        <hr>

        {{-- @forelse ($classworks as $classwork) --}}
        <br>
        {{-- <h3>{{ $classworks->first()->topic->name }}</h3> --}}
        <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach ($classworks as $classwork)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $classwork->id }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $classwork->id }}">
                            {{ $classwork->title }}
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $classwork->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            {{ $classwork->description }}

                        </div>
                        <div>
                            <a class="btn btn-sm btn-outline-dark"
                                href="{{ route('classrooms.classworks.edit', [$classwork->classroom_id, $classwork->id]) }}">Edit</a>
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('classrooms.classworks.show', [$classwork->classroom_id, $classwork->id]) }}">Show</a>
                        </div>
                    </div>
            @endforeach

        </div>
        {{-- @empty
                        <p class="text-center fs-4"> No Classrooms Found.</p>
                    @endforelse --}}
        {{ $classworks->withQueryString()->appends([' '])->links('vendor.pagination.bootstrap-5') }}

    </div>




@endsection
