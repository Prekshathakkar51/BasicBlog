<nav class="navbar bg-base-100">
    <div class="navbar-start">
        <a href="/" class="btn btn-ghost text-xl">Blog</a>
    </div>

    <div class="navbar-center">
        <div class="form-control">


            <input type="text" id="searchInput" placeholder="Search by Username or title"
                class="input input-bordered w-full mt-4" />

        </div>
    </div>


    <div class="navbar-end gap-2">
        <button id="theme-toggle" class="btn btn-sm">
            Toggle Theme
        </button>
        
        @auth
            <span class="text-sm">{{ auth()->user()->name }}</span>
            <form method="POST" action="/logout" class="inline">
                @csrf
                <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
            </form>
        @else
            <a href="/login" class="btn btn-ghost btn-sm">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
        @endauth
    </div>
</nav>