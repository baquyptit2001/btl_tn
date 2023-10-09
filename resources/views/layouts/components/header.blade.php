<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">QuyNB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" nav-name="home"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Articles</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item" nav-name="contact"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                @auth()
                    <li class="nav-item dropdown d-flex">
                            <span class="dropdown-toggle nav-link pb-0" type="button" data-toggle="dropdown" aria-expanded="false">
                                Hello, {{ auth()->user()->name }}
                            </span>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Profile</a>
                                @if(auth()->user()->isAdmin())
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                @endif
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                    </li>
                @endauth
                @guest()
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
