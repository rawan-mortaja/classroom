<div class="card">
    <img src="storage/{{ $classroom->cover_image_path }}" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">{{ $classroom->name }}</h5>
        <p class="card-text">{{ $classroom->section }} - {{ $classroom->room }}</p>
        <a href="{{ route('classrooms.show' , $classroom->id)}}" class="btn btn-sm btn-primary">View</a>
        <a href="{{ route('classrooms.edit' , $classroom->id)}}" class="btn btn-sm btn-dark">Edit</a>
        <form action="{{ route('classrooms.destroy' , $classroom->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger ">Delete</button>
        </form>
    </div>
</div>
