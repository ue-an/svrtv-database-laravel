
<header class="p-3 bg-dark text-white">
 {{-- <div class="container"> --}}
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
        @auth
        <li><a href="/" class="nav-link px-2 text-white">Search</a></li>
        <li><a href="/attendees" class="nav-link px-2 text-white">End Users</a></li>
        <li><a href="/events" class="nav-link px-2 text-white">Events</a></li>
        <li><a href="/feastbook-transactions" class="nav-link px-2 text-white">Feast Books</a></li>
        <li><a href="/feast-mercyministry" class="nav-link px-2 text-white">Feast Mercy Ministry</a></li>
        <li><a href="/feastph" class="nav-link px-2 text-white">Feast PH</a></li>
        <li><a href="/feastmedia" class="nav-link px-2 text-white">Feast Media</a></li>
        <li><a href="/feast-app" class="nav-link px-2 text-white">Feast App</a></li>
        <li><a href="/holyweek-retreat" class="nav-link px-2 text-white">Holy Week Retreat</a></li>
      </ul>
      {{-- @auth --}}
       {{auth()->user()->name}}
       <div class="text-end">
        <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
      </div>
      @endauth

      @guest
       <div class="text-end">
         <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
         {{-- <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a> --}}
       </div>
     @endguest
  </div>
 {{-- </div> --}}
</header>