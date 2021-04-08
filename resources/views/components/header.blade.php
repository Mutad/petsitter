<div class="navbar navbar-expand navbar-light bg-light rounded">
    <div class="container">
        <a class="navbar-brand" href="/">Petsitter</a>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pets*') ? 'active' : '' }}" href="/pets">Huisdieren</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('orders*') ? 'active' : '' }}" href="/orders">Bestellingen</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if (Auth::check() && Auth::user()->sitter)
                    <li class="nav-item">
                        <a href="{{ route('sitters.show', Auth::user()->sitter) }}" class="nav-link">Sitterprofiel</a>
                    </li>
                @endif
            </ul>
            @if (Auth::check())
                <a href="{{ route('user.show', Auth::user()) }}" class="navbar-brand">Profiel</a>
            @else
                <a href="/login" class="navbar-brand">Log in</a>
            @endif
        </div>
    </div>
</div>
