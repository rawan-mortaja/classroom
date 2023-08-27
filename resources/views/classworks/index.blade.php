@extends('layout.master')

@section('title', 'Classworks')
@section('content')
    @include('classrooms.navbar')
    <div class="container p-lg-4">
        <h3>{{ $classroom->name }}</h3>
        <hr>
        <div class="row">
            <div class="col-md-7">
                <h4>Classwork
                    @can('create', ['App\\Models\classwork', $classroom])
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle shadow-primary" type="button" id="dropdownMenuButton1"
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
                    @endcan
                </h4>
            </div>
            <div class="col-md-5">
                <form action="{{ URL::current() }}" method="get" class="row row-cols align-items-center">
                    <div class=" d-flex">
                        <input type="text" placeholder="search" name="search"
                            class="form-control rounded-l-md border pr-2">
                        <button class="btn btn-primary ms-2 m-2" type="submit">Find</button>
                    </div>
                </form>

            </div>
        </div>
        <hr>

        {{-- @forelse ($classworks as $group) --}}
        <div class="accordion accordion-flush" id="accordionFlushExample">
            {{-- <h3>{{ $classworks->first()->topic->name }}</h3> --}}
            @foreach ($classworks as $classwork)
                <div class="accordion-item  m-lg-2  border p-4">
                    <h2 class="accordion-header m-lg-2 ">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $classwork->id }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $classwork->id }}">
                            {{ $classwork->title }} / {{ $classwork->topic->name }}
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $classwork->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            {{ $classwork->description }}
                        </div>
                        <div>
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('classrooms.classworks.show', [$classwork->classroom_id, $classwork->id]) }}">View</a>
                            <a class="btn btn-sm btn-dark"
                                href="{{ route('classrooms.classworks.edit', [$classwork->classroom_id, $classwork->id]) }}">Edit</a>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {{-- @empty
            <p class="text-center fs-4"> No Classrooms Found.</p>
        @endforelse --}}
        {{ $classworks->withQueryString()->appends([' '])->links('vendor.pagination.bootstrap-5') }}

    </div>



    @push('scripts')
        <script>
            const classroomId = "{{ $classwork->classroom_id }}";
        </script>
        @vite(['resources/js/app.js'])
    @endpush
@endsection
