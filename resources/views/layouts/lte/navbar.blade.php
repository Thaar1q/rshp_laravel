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
			@auth
				@php
					$activeRoles = Auth::user()->getActiveRoles();
				@endphp
				@if(!empty($activeRoles))
					<li class="nav-item d-flex align-items-center me-3">
						<span class="text-muted me-2">Roles:</span>
						@foreach($activeRoles as $role)
							<span class="badge bg-primary me-1">{{ ucfirst($role) }}</span>
						@endforeach
					</li>
				@endif
			@endauth
			<li class="nav-item dropdown user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
					<img src="{{ asset('assets/img/user.png') }}" class="user-image rounded-circle shadow"
						alt="User Image" />
				</a>
				<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
					<li class="user-header text-bg-primary">
						<img src="{{ asset('assets/img/user.png') }}" class="rounded-circle shadow" alt="User Image" />
						<p>{{ Auth::user()->nama }} <small>Insert something here</small></p>
					</li>

				<li class="user-footer">
					<form action="{{ route('logout') }}" method="POST">@csrf
						<a href="#" class="btn btn-default btn-flat float-end"
							onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
					</form>
					<a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
				</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>