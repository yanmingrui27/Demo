

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}">Student Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hidden-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  </div>
    <div class="collapse navbar-collapse" id="hidden-nav">
      <ul class="nav navbar-nav">
        <li><a class="nav-item nav-link" href="{{ url('/') }}">Home  </a></li>
          @if($layout != 'student')
          <li><a class="nav-item nav-link" href="{{ url('/create') }}">Create </a></li>
          @endif
          <li><div class="dropdown nav-item">
            <span>{{ Auth::user()->email }}</span>
            <div class="dropdown-content">
            <a href="{{ url('/logout') }}" class="button">Logout</a>
            </div>
          </div></li>
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>