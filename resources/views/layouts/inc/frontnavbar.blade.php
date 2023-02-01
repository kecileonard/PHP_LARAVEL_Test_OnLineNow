<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">OnLineNow </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('#') }}">About Us</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('#') }}">Services</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/category') }}">Category</a>
        </li>


        @guest
            @if (Route::has('login.show'))

                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.show') }}">{{ __('Login') }}</a>
                 </li>

            @endif

            @if (Route::has('register.show'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register.show') }}">{{ __('Sign Up') }}</a>
                </li>
            @endif

        @else

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->first_name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

              <li>
                  <a class="dropdown-item" href="#"> My Profile </a>
              </li>

              <li>
                    <a class="dropdown-item" href="{{ route('logout.perform') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" d-none">
                        @csrf
                    </form>
              </li>

            </ul>
        </li>

        @endguest

      </ul>
    </div>
  </div>
</nav>
