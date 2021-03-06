<nav class="col-md-2 d-none d-md-block bg-dark sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column pt-5">
      <li class="nav-item">
        <a class="nav-link sidebar-item" href="/dashboard">
          <span></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link sidebar-item" href="/profile/{{auth()->user()->id}}/edit">
          <span></span>
          My Profile
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link sidebar-item" href="/members">
          <span data-feather="file"></span>
          Organization Members
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link sidebar-item" href="/finance">
          <span data-feather="file"></span>
          Finance
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Community</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link sidebar-item" href="/events">
          <span data-feather="file"></span>
          My Events
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link sidebar-item" href="/newsfeed">
          <span data-feather="file"></span>
          Newsfeed
        </a>
      </li>
    </ul>
    <br>
    <br>
    <div class="container">
      <span class="text-white">An LIS 162 Project by</span>
      <br>
      <span class="text-primary">Marc Almond Valleza</span>
    </div>
  </div>
</nav>
