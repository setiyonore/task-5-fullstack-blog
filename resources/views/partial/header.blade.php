<header class="tm-header" id="tm-header">
    <div class="tm-header-wrapper">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="tm-site-header">
            <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
            <h1 class="text-center">Xtra Blog</h1>
        </div>
        <nav class="tm-nav" id="tm-nav">
            <ul>
                <li class="{{ request()->route()->named('blog.home') ? 'tm-nav-item active' : 'tm-nav-item'}}"><a href="{{route('blog.home')}}" class="tm-nav-link">
                    <i class="fas fa-home"></i>
                    Blog Home
                </a></li>
                <li class="{{ request()->route()->named('post.create') ? 'tm-nav-item active' : 'tm-nav-item'}}"><a href="{{route('post.create')}}" class="tm-nav-link">
                    <i class="fas fa-pen"></i>
                    Create Post
                </a></li>
            </ul>
        </nav>
    </div>
</header>
