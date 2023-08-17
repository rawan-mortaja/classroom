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
        <x-from.floating-control name="title" placeholder="Title">
            <x-from.input name="title" class="form-control-lg" :value="$classwork->title" placeholder="Title" />
        </x-from.floating-control>
        <x-from.floating-control name="description" placeholder="Description (Optional)">
            <x-from.textarea name="description" class="form-control-lg" :value="$classwork->description"
                placeholder="Description (Optional)" />
        </x-from.floating-control>
    </div>
    <div class="col-md-4">
        <x-from.floating-control name="published_at" placeholder="Published Date">
            <x-from.input name="published_at" type="date" class="form-control-lg" :value="$classwork->published_date"
                placeholder="Published Date" />
        </x-from.floating-control>

        <div>
            @foreach ($classroom->students as $student)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="students[]" value="{{ $student->id }}"
                        id="std-{{ $student->id }}" @checked(!isset($assinged) || in_array($student->id, $assigned ?? []))>
                    <label class="form-check-label" for="std-{{ $student->id }}">
                        {{ $student->name }}
                    </label>
                </div>
            @endforeach
        </div>

        @if ($type == 'assignment' || $type == 'question')
            <x-from.floating-control name="options[grade]" placeholder="Grade">
                <x-from.input name="options[grade]" type="number" class="form-control-lg" :value="$classwork->options['grade'] ?? ''"
                    placeholder="Grade" />
            </x-from.floating-control>
            <x-from.floating-control name="options[due]" placeholder="Due">
                <x-from.input name="options[due]" type="date" class="form-control-lg" :value="$classwork->options['due'] ?? ''"
                    placeholder="Due" />
            </x-from.floating-control>
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
