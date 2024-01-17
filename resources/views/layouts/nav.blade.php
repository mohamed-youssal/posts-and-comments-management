<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <a class="navbar-brand text-white" href="/">Pooster</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-white" href="/">Home</a>
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('login')}}">login</a>
          </li>
          <li class="nav-item text-white">
            <a class="nav-link text-white" href="{{route('register')}}">register</a>
          </li>
        @endguest
        <li class="nav-item">
          <a class="nav-link text-white" href="#"></a>
        </li>
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{auth()->user()->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
              <form method="POST" action="{{route('logout')}}">
                @csrf
                <button type="submit" class="btn btn-sm text-danger">logout</button>
            </form>
            </a>
          </div>
        </li>
        @endauth
      </ul>
    
    </div>
  </nav>