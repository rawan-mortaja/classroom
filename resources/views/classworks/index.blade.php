@extends('layout.master')

@section('title', 'Classworks')
@section('content')
    <div class="bottom-100"></div>
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
    </li> --}}
    </ul>
    <br> <br>

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

        @forelse ($classworks as $group)
            <h3>{{ $group->first()->topic->name }}</h3>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ($group as $classwork)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse{{ $classwork->id }}" aria-expanded="false"
                                aria-controls="flush-collapse{{ $classwork->id }}">
                                {{ $classwork->title }} / {{ $classwork->topic->name }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $classwork->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> {{ $classwork->description }}
                            </div>
                        </div>
                @endforeach
            </div>
        @empty
            <p class="text-center fs-4"> No Classrooms Found.</p>
        @endforelse
    @endsection

</div>
