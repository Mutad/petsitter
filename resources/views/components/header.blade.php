<div class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <div class="d-flex col-sm-10 mx-auto container">
        <a class="navbar-brand" href="/">PassenOpJeDier.nl</a>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbar">
            {{-- <ul class="navbar-nav me-auto">
                
            </ul> --}}
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pets*') ? 'active' : '' }}" href="/pets">Huisdieren</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('orders*') ? 'active' : '' }}" href="/orders">Bestellingen</a>
                </li>
                <li class="nav-item">

                    @if (Auth::check())
                        <a href="{{ route('user.show', Auth::user()) }}"
                            class="nav-link {{ request()->is('user*') ? 'active' : '' }}">Huisdier-profiel</a>
                    @else
                        <a href="/login" class="navbar-brand">Log in</a>
                    @endif
                </li>
                @if (Auth::check())
                    @if (Auth::user()->admin)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}"
                                href="/admin">Admin</a>
                        </li>
                    @endif
                    @if (Auth::user()->sitter)
                        <li class="nav-item">
                            <a href="{{ route('sitters.show', Auth::user()->sitter) }}"
                                class="nav-link">Oppas-profiel</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('sitters.create') }}" class="btn btn-primary">Oppasser worden</a>
                        </li>
                    @endif
                @endif
            </ul>

        </div>

    </div>
</div>
