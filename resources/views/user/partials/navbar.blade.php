<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item {{ $title === 'Genre' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user/genre') }}">Genre</a>
                </li>
                <li class="nav-item {{ $title === 'Community' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.community') }}">Community</a>
                </li>
                <li class="nav-item {{ $title === 'Store' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.store') }}">Store</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->username }}</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </button>
                    </form>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $title === 'login' ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
