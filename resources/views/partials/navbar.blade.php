<!-- Navbar  -->
<header>
    <a href="/" class="navbar-brand center"> <i class="bx bxs-movie"></i> Silver Screen Saga</a>
    <div class="bx bx-menu" id="menu-icon"></div>

    <!-- menu  -->
    <ul class="navbar center">
        <li class="nav-item">
            <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item {{ $title === 'Genre' ? 'active' : '' }}">
            <a class="nav-link" href="/genre">Genre</a>
        </li>
        <li class="nav-item {{ $title === 'Community' ? 'active' : '' }}">
            <a class="nav-link" href="/community">Community</a>
        </li>
        <li class="nav-item {{ $title === 'Store' ? 'active' : '' }}">
            <a class="nav-link" href="/store">Store</a>
        </li>
        <li class="nav-item">
            <a href="/login" class="nav-link {{ $title === 'login' ? 'active' : '' }}">
                <i class="bi bi-box-arrow-in-right"></i>
                Login
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">
                Register
            </a>
        </li>
    </ul>
</header>
