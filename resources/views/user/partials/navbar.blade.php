<!-- Navbar  -->
<header>
    <a href="/" class="navbar-brand center"> <i class="bx bxs-movie"></i> Silver Screen Saga</a>
    <div class="bx bx-menu" id="menu-icon"></div>

    <!-- menu  -->
    <ul class="navbar center">
        <li class="nav-item">
            <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" aria-current="page"
                href="{{ route('user.home') }}">Home</a>
        </li>
        <li class="nav-item {{ $title === 'Genre' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.genres') }}">Genre</a>
        </li>
        <li class="nav-item {{ $title === 'Community' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.community') }}">Community</a>
        </li>
        <li class="nav-item {{ $title === 'Store' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.store') }}">Store</a>
        </li>
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">{{ Auth::user()->username }}</a>
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
        <ul class="navbar-nav ms-auto">

        </ul>
</header>
