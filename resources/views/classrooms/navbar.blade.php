<nav class="  navbar-light bg-light sticky-top">
    <div class="shadow-primary border-radius-lg py-1 pe-1 text-bold ">
        <ul class="nav nav-pills nav-justified ">
            <li class="nav-item">
                <a class="nav-link active " aria-current="page"
                    href="{{ route('classrooms.show', $classroom->id) }}">Stream</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('classrooms.classworks.index', $classroom->id) }}">Classworks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('classrooms.people', $classroom->id) }}">Peoples</a>
            </li>
            {{-- <li class="nav-item">
  <a class="nav-link disabled" aria-disabled="true">Grades</a>
</li> --}}
        </ul>
    </div>
</nav>
