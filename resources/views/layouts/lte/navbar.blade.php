<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
    </ul>

    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img src="{{ asset('assets/img/user.png') }}" class="user-image rounded-circle shadow" alt="User Image" />
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <li class="user-header text-bg-primary">
            <img src="{{ asset('assets/img/user.png') }}" class="rounded-circle shadow" alt="User Image" />
            <p>Thaar1q - A Dev <small>Member since Nov. 2025</small></p>
          </li>

          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>