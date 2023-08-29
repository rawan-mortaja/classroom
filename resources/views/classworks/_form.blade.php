<x-alert name="error" type="danger" />
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
    <div class="col-md-8">
        <div class="input-group input-group-outline">
            <x-from.floating-control name="title" placeholder="Title">
                <x-from.input name="title" class="form-control-lg" :value="$classwork->title" placeholder="Title" />
            </x-from.floating-control>
        </div>
        <div class="input-group input-group-outline">
            <x-from.floating-control name="description" placeholder="Description (Optional)">
                <x-from.textarea name="description" class="form-control" :value="$classwork->description"
                    placeholder="Description (Optional)"/>
            </x-from.floating-control>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group input-group-outline">
            <x-from.floating-control name="published_at" placeholder="Published Date">
                <x-from.input name="published_at" type="date" class="form-control-lg" :value="$classwork->published_date"
                    placeholder="Published Date" />
            </x-from.floating-control>
        </div>
        <div class="dropdown input-group input-group-outline">
            <button class="btn btn-outline-secondary dropdown-toggle btn-lg w-100" type="button"
                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                All Stusents
            </button>
            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                @foreach ($classroom->students as $student)
                    <li>
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" name="students[]"
                                value="{{ $student->id }}" id="std-{{ $student->id }}" @checked(!isset($assinged) || in_array($student->id, $assigned ?? []))>
                            <label class="form-check-label" for="std-{{ $student->id }}">
                                {{ $student->name }}
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        @if ($type == 'assignment' || $type == 'question')
            <div class="input-group input-group-outline">
                <x-from.floating-control name="options[grade]" placeholder="Grade">
                    <x-from.input name="options[grade]" type="number" class="form-control-lg" :value="$classwork->options['grade'] ?? ''"
                        placeholder="Grade" />
                </x-from.floating-control>
            </div>
            <div class="input-group input-group-outline">
                <x-from.floating-control name="options[due]" placeholder="Due">
                    <x-from.input name="options[due]" type="date" class="form-control-lg" :value="$classwork->options['due'] ?? ''"
                        placeholder="Due" />
                </x-from.floating-control>
            </div>
        @endif
        <x-from.floating-control name="topic_id" placeholder="Topic ID (Optional)">
            <select class="form-select" name="topic_id" id="topic_id">
                <option value="">No Topic</option>
                @foreach ($classroom->topics as $topic)
                    <option @selected($topic->id == $classwork->topic_id) value="{{ $topic->id }}">{{ $topic->name }}
                    </option>
                @endforeach
            </select>
            {{-- <x-errors name="topic_id" /> --}}
        </x-from.floating-control>
    </div>
</div>
@push('styles')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
@endpush
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/7p63zvbxf4482hgw7pny26jmnzo14qjsdwsfz864cviy4dgq/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant"))
        });
    </script>
@endpush
