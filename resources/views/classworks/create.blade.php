@extends('layout.master')

@section('title', 'Create Classwork')
@section('content')
    <div class="container">
        <h1>{{ $classroom->name }} (#{{ $classroom->id }})</h1>
        <h3>Create Classwork</h3>
        <hr>
        <form action="{{ route('classrooms.classworks.store', [$classroom->id, 'type' => $type]) }}" method="POST">
            @csrf
            <x-from.floating-control name="title" placeholder="Title">
                <x-from.input name="title" class="form-control-lg" placeholder="Description" />
            </x-from.floating-control>
            <x-from.floating-control name="description" placeholder="Description (Optional)">
                <x-from.textarea name="description" class="form-control-lg" placeholder="Description (Optional)" />
            </x-from.floating-control>
            <x-from.floating-control name="topic_id" placeholder="Topic ID (Optional)">
                <select class="form-select" name="topic_id" id="topic_id">
                    <option value="">No Topic</option>
                    @foreach ($classroom->topics as $topic)
                        <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                    @endforeach
                </select>
                <x-form.errors name="topic_id" />
                <button type="submit" class="btn btn-primary">Create</button>
            </x-from.floating-control>
        </form>
    </div>

@endsection
