@extends('layout.master')

@section('title', 'Show Classwork')
@section('content')
    @include('classrooms.navbar')
    {{-- @include('./classrooms.index') --}}
    <div class="containe p-lg-4">
        <h2> {{ $classroom->name }} </h2>
        <x-alert name="success" class="alert-success" />
        <x-alert name="error" class="alert-danger" />
        {{-- <h5>{{ $classroom->teachers()->name}}</h5> --}}
        {{-- <h6>{{ $classwork->created_at }}</h6> --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-10">
                <h4> <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M hhikbc">
                        <path d="M7 15h7v2H7zm0-4h10v2H7zm0-4h10v2H7z"></path>
                        <path
                            d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-.14 0-.27.01-.4.04a2.008 2.008 0 0 0-1.44 1.19c-.1.23-.16.49-.16.77v14c0 .27.06.54.16.78s.25.45.43.64c.27.27.62.47 1.01.55.13.02.26.03.4.03h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7-.25c.41 0 .75.34.75.75s-.34.75-.75.75-.75-.34-.75-.75.34-.75.75-.75zM19 19H5V5h14v14z">
                        </path>
                    </svg>
                    {{ $classwork->title }}
                </h4>
            </div>
            <div class="col-md-2">
                <div class="dropdown">
                    <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="text-center">
                            <a href="{{ route('classrooms.classworks.edit', [$classroom->id, $classwork->id]) }}"
                                class="btn btn-light text-dark link-underline-opacity-0 text-secondary font-weight-normal text-s">Edit</a>
                        </li>
                        <li class="text-center">
                            <form action="{{ route('classrooms.classworks.destroy', [$classroom->id, $classwork->id]) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="user_id" value="{{ $classwork->id }}">
                                <button type="submit"
                                    class=" btn btn-light text-danger link-underline-opacity-0 text-secondary font-weight-normal ">
                                    Delete</button>
                            </form>
                        </li>
                        <li class="text-center">
                            {{-- <a id="copyButton" href="{{ $invitation_link }}"
                                class="btn-light text-dark link-danger  border-0  link-underline-opacity-0 link-underline-text-primary link-underline-opacity-0-hover">Copy link</a> --}}

                        </li>
                    </ul>
                </div>
                {{-- <hr> --}}
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div>
                    <p> {{ $classwork->description }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-3 bg-light mb-20 ">
                    <h5>Submissions</h5>
                    @if ($submissions->count())
                        <ul>
                            @foreach ($submissions as $submission)
                                <li><a href="{{ route('submission.file', $submission->id) }}">File
                                        #{{ $loop->iteration }}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <form action="{{ route('submission.store', $classwork->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <x-from.floating-control name="files.0" placeholder="">
                                <div class="input-text">
                                    <label for="files">Upload Files</label>
                                    <x-from.input type="file" name="files[]" multiple placeholder="select Files"
                                        class="border bg-gray-100" />
                                </div>
                            </x-from.floating-control>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h4>Comments</h4>
                <div jsname="tJHJj" jsaction="JIbuQc:jkaCtf" class="WuChGe QRiHXd aHTZpf"><span
                        class="xSP5ic ho6Zoe bxp7vf"><svg focusable="false" width="24" height="24"
                            viewBox="0 0 24 24" class=" NMm5M">
                            <path
                                d="M15 8c0-1.42-.5-2.73-1.33-3.76.42-.14.86-.24 1.33-.24 2.21 0 4 1.79 4 4s-1.79 4-4 4c-.43 0-.84-.09-1.23-.21-.03-.01-.06-.02-.1-.03A5.98 5.98 0 0 0 15 8zm1.66 5.13C18.03 14.06 19 15.32 19 17v3h4v-3c0-2.18-3.58-3.47-6.34-3.87zM9 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2m0 9c-2.7 0-5.8 1.29-6 2.01V18h12v-1c-.2-.71-3.3-2-6-2M9 4c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm0 9c2.67 0 8 1.34 8 4v3H1v-3c0-2.66 5.33-4 8-4z">
                            </path>
                        </svg>
                        <span class="asQXV QRiHXd">{{ $classwork->comments->count() }} class comment</span>
                </div>
                <div class="input-group-lg input-group-outline my-3">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        {{-- @method('put') --}}
                        <input type="hidden" name="id" value="{{ $classwork->id }}">
                        <input type="hidden" name="type" value="classwork">
                        <div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="flex-grow-1 input-group input-group-outline my-3 ">
                                        <x-from.input-errors name="comment" />
                                        <x-from.floating-control name="content" placeholder="">
                                            <div class="input-group border">
                                                <input type="text" name="content" class="form-control p-lg-3"
                                                    placeholder="Comment " aria-label="Add class comment...">
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="input-group-append input-group input-group-outline my-3">
                                    <button class="btn btn-outline-primary btn-group-lg" type="submit"><i
                                            class="fas fa-paper-plane"></i></button>
                                </div>
                            </div>
                            </x-from.floating-control>
                        </div>
                    </form>


                    <div class="bg-light">
                        @foreach ($classwork->comments as $comment)
                            <div class="row m-lg-3 ">
                                <div class="col-md-2 ">
                                    <div class="media-body mt-2">
                                        <img src="https://ui-avatars.com/api/?name={{ $comment->user->name }}&size=70&background=5EBEF5&color=fff"
                                            class="mr-3x` WqfsMd" alt="User Avatar">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="media ruTJle mt-2">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a href="#" class="gJItbc asQXV">{{ $comment->user->name }}</a>
                                                <span
                                                    class="mr-4">{{ $comment->created_at->diffForHumans(null) }}</span>
                                                <div class="thiSD Gh0umc">
                                                    <div class="dropdown">
                                                        {{-- <a class="btn btn-link" type="button" id="commentOptionsDropdown"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg focusable="false" width="24" height="24" viewBox="0 0 24 24"
                                                        class=" NMm5M">
                                                        <path
                                                            d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="commentOptionsDropdown">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="VSWCL tLDEHd mb-2">
                                                <span>{{ $comment->content }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



        </div>
    @endsection
