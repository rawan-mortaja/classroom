@extends('layout.master')

@section('title', 'People Classrooms')
@section('content')
    <div class="container">
        <h1>{{ $classroom->name }} People</h1>
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
                        <td></td>
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
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
