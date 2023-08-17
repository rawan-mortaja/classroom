@extends('layout.master')

@section('title', 'People Classrooms')
@section('content')

    @include('classrooms.navbar')
    <div class="container">
        <x-alert name="success" class="alert-success" />
        <x-alert name="error" id="error" class="alert-danger" />
        <div class="p-lg-5">
            <h3>{{ $classroom->name }} PEOPLE</h3>

            <h4>Teachers</h4>
            <div class="card">
                <table class="table align-items-center mb-0">
                    <thead>
                        <th></th>
                        <th class="text-uppercase text-primary text-s font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-primary text-s font-weight-bolder opacity-7 ps-2">Role</th>
                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7"></th>
                    </thead>
                    <tbody>
                        @foreach ($classroom->teachers()->orderBy('name')->get() as $tech)
                            <tr>
                                <td class="align-middle "></td>
                                <td class="align-middle ">{{ $tech->name }}</td>
                                <td class="align-middle">{{ $tech->pivot->role }}</td>
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
                                                    <a type="submit"
                                                        class=" btn-light text-danger   link-underline-opacity-0 text-secondary font-weight-normal text-s">
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
            <br>
            <h4>Students</h4>
            <div class="card">
                <table class="table align-items-center mb-0">
                    <thead>
                        <th></th>
                        <th class="text-uppercase text-primary  text-s font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-primary text-s font-weight-bolder opacity-7 ps-2">Role</th>
                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7"></th>
                    </thead>
                    <tbody>
                        @foreach ($classroom->students()->orderBy('name')->get() as $user)
                        <tr>
                            <td class="align-middle"></td>
                            <td class="align-middle ">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->pivot->role }}</td>
                            <td >
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
                                                <a type="submit"
                                                    class=" btn-light text-danger   link-underline-opacity-0 text-secondary font-weight-normal text-s">
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
