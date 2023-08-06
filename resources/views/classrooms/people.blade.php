@extends('layout.master')

@section('title', 'People Classrooms')
@section('content')

    <ul class="nav justify-content-center nav-tabs">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{ route('classrooms.show', $classroom->id) }}">Stream</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('classrooms.classworks.index', $classroom->id) }}">Classworks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('classrooms.people', $classroom->id) }}">Peoples</a>
        </li>
        {{-- <li class="nav-item">
      <a class="nav-link disabled" aria-disabled="true">Grades</a>
    </li> --}}
    </ul>
    <br>


    <div class="container">
        <x-alert name="success" class="alert-success" />
        <x-alert name="error" id="error" class="alert-danger" />

        <h1>{{ $classroom->name }} PEOPLE</h1>
        <hr>
        <h4>Teachers</h4>
        <table class="table">

            <thead>
                <th></th>
                <th>Name</th>
                <th>Role</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($classroom->teachers()->orderBy('name')->get() as $tech)
                    <tr>
                        <td></td>
                        <td>{{ $tech->name }}</td>
                        <td>{{ $tech->pivot->role }}</td>
                        <td>
                            <div class="dropdown">
                                <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="text-center">
                                        <form action="{{ route('classrooms.people.destroy', $classroom->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="user_id" value="{{ $tech->id }}">
                                            <button type="submit"
                                                class=" btn-light text-danger link-danger  border-0  link-underline-opacity-0 left-100 link-underline-opacity-0-hover">
                                                Remove</button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Students</h4>
        <table class="table">

            <thead>
                <th></th>
                <th>Name</th>
                <th>Role</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($classroom->students()->orderBy('name')->get() as $user)
                    <tr>
                        <td></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->pivot->role }}</td>
                        <td>
                            <div class="dropdown">
                                <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="text-center">
                                        <form action="{{ route('classrooms.people.destroy', $classroom->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <a type="submit"
                                                class="btn-light text-danger link-danger  border-0  link-underline-opacity-0 left-100 link-underline-opacity-0-hover">
                                                Remove</a>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
