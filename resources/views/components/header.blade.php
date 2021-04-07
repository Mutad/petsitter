<div class="navbar navbar-expand navbar-light bg-light rounded">
    <div class="container">
        <a class="navbar-brand" href="/">Petsitter</a>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('pets*')) ? 'active' : '' }}" href="/pets">Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('sitters*')) ? 'active' : '' }}" href="/sitters">Sitters</a>
                </li>
            </ul>
            @if (Auth::check())
                <a href="/profile" class="navbar-brand">Profile</a>
            @else
                <a href="/login" class="navbar-brand">Login</a>
            @endif
        </div>
    </div>
</div>
