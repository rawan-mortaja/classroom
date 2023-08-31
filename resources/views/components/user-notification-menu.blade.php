    <li class="nav-item dropdown">
        <a class="nav-link btn dropdown-toggle " href="#" role="button" type="button" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-expanded="false">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">notifications</i>
            </div>
            Notifications
            @if ($unreadCount)
                <span class="badge bg-primary m-1">{{ $unreadCount }}</span>
            @endif
        </a>

        <ul class="dropdown-menu" style="width: 100%">
            @foreach ($notifications as $notification)
                <li>
                    <a class="dropdown-item" href="{{ $notification->data['link'] }}?nid={{ $notification->id }}" style="width:100%">
                        @if ($notification->unread())
                            <b>*</b>
                        @endif
                        {{__($notification->data['body']) }}
                        <br>
                        <small class="text-muted">
                            {{ $notification->created_at->diffForHumans() }}
                        </small>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
            @endforeach
        </ul>


    </li>
