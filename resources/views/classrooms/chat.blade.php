@extends('layout.master')

@section('title', $classroom->name)

@section('content')
    <div class="container">
        <h1>{{ $classroom->name }} - Chat Room</h1>

        <div class="row">
            <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                    <ul id="users"></ul>
                </div>
            </div>
            <div class="col-md-9">
                <div id="messages" class="border rounded bg-light p-3 mb-3">

                </div>
                <div id="whisper" class="text-sm fs-5 text-muted"></div>
                <form class="row g-3 align-items-center" id="message-form">
                    <div class="col-12">
                        <label class="visually-hidden" for="body">Username</label>
                        <div class="input-group">
                            <div class="input-group-text"></div>
                            <textarea class="form-control" name="body" id="body" placeholder="Type your message.."></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script src="jquery.min.js"></script> --}}

    <script>
        const messages = {
            list_url: "{{ route('classrooms.messages.index', [$classroom->id]) }}",
            store_url: "{{ route('classrooms.messages.store', [$classroom->id]) }}",
        };
        const csrf_token = "{{ csrf_token() }}";
        const user = {
            id: "{{ Auth::id() }}"
            name: "{{ Auth::user()->name }}"
        };
        const calssroom = "{{ $classroom->id }}";
    </script>

    @vite(['resources/js/chat.js'])
@endpush
