@if (Route::has('login'))
    <div class=" fixed top-0 right-0 px-6 py-4 sm:block">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    @auth
                   <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                   <li class="breadcrumb-item"><a href="{{ url('/templates') }}">Templates</a></li>
                   <li class="breadcrumb-item"><a href="{{ url('/logout') }}">Logout</a></li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ url('/login') }}">Login</a></li>
                        @if (Route::has('register'))
                        <li class="breadcrumb-item"><a href="{{ url('/register') }}">Register</a></li>
                        @endif
                    @endauth
  
            </ol>
        </nav>
    </div>
@endif