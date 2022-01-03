<nav class="navbar">
    <div class="container-fluid text-light me-5">
        <a class="navbar-brand text-light" href="/">Taskify</a>

        <a class="navbar-link text-light" href="/dashboard">Home</a>
        @auth
            <a class="navbar-link text-light" href="/">Profile</a>
            
            <a class="navbar-link text-light" href="/logout">Logout
            </a>
        @endauth
        @guest
        <a class="navbar-link text-light" href="/login">Login
        </a>
        <a class="navbar-link text-light" href="/register">Register
        </a>
        @endguest

    </div>
</nav>