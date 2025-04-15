<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">ToDoList</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (Auth::user()->role == 'worker')
                    <li class="nav-item">
                        <a href="/worker" class="nav-link {{ Request::is('worker') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/quest"
                            class="nav-link {{ Request::is('quest') ? 'active' : '' }} position-relative">Quest
                        </a>
                    </li>
                @elseif (Auth::user()->role == 'tasker')
                    <li class="nav-item">
                        <a href="/tasker" class="nav-link {{ Request::is('tasker') ? 'active' : '' }}">Home</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">Home</a>
                    </li>
                @endif

            </ul>
            <ul class="navbar-nav ms-auto">
                @if (Auth::user()->role == 'worker')
                    @php
                        $notifications = Auth::user()->unreadNotifications;
                    @endphp
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img
                                src="{{ asset('asset/bell.png') }}" style="width: 20px">
                            @if ($notifications->count() > 0)
                                <span
                                    class="position-absolute top-1 start-80 translate-middle badge rounded-pill bg-danger">
                                    {{ $notifications->count() }}
                                </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @forelse ($notifications as $item)
                                @if ($item->data['created_by'] != Auth::id())
                                    <li>
                                        <a href="/quest/task-list/{{ $item->data['task_id'] }}"
                                            class="dropdown-item">{{ $item->data['message'] }}</a>
                                    </li>
                                @endif
                            @empty
                                <li>
                                    <a href="#" class="dropdown-item">tidak ada tugas</a>
                                </li>
                            @endforelse
                            @if ($notifications->count() > 0)
                                <hr>
                                <li>
                                    <a href="/mark-all-read" class="dropdown-item">tandai sudah dibaca</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="/logout" class="dropdown-item">logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
