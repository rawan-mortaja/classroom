@extends('layout.master')

@section('title', 'Update Classwork')
@section('content')
    <div class="container">
        <h1>{{ $classroom->name }} (#{{ $classroom->id }})</h1>
        <h3>Update Classwork</h3>
        <x-alert name="success" class="alert-success" />

        <hr>
        <form action="{{ route('classrooms.classworks.update', [$classroom->id, $classwork->id, 'type' => $type]) }}"
            method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-8">

                    <x-from.floating-control name="title" :value="$classwork->title" placeholder="Title">
                        <x-from.input name="title" class="form-control-lg" placeholder="Description" />
                    </x-from.floating-control>
                    <x-from.floating-control name="description" :value="$classwork->description" placeholder="Description (Optional)">
                        <x-from.textarea name="description" class="form-control-lg" placeholder="Description (Optional)" />
                    </x-from.floating-control>


                </div>
                <div class="col-md-4">
                    <div>
                        @foreach ($classroom->students as $student)
                            <div class="form-check">
                                <input class="form-check-input" name="students[]" type="checkbox"
                                    value="{{ $student->id }}" id="std-{{ $student->id }}" @checked(in_array($student->id, $assigned))>
                                <label class="form-check-label" for="std-{{ $student->id }}">
                                    {{ $student->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <x-from.floating-control name="topic_id" placeholder="Topic ID (Optional)">
                        <select class="form-select" name="topic_id" id="topic_id">
                            <option value="">No Topic</option>
                            @foreach ($classroom->topics as $topic)
                                <option @selected($topic->id == $classwork->topic_id) value="{{ $topic->id }}">{{ $topic->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-errors name="topic_id" />
                    </x-from.floating-control>
                </div>
            </div>
            {{-- <hr> --}}
            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>

@endsection
