<nav class="navbar navbar-expand-lg navbar-light ps-3" style="background-color: #B09796; margin-left: 250px;">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto me-4">
            <img src="{{ asset('storage/' . auth()->user()->icon) }}" width="40" height="40" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="font-family: 'Bold', sans-serif;" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->first_name ?? 'User' }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>