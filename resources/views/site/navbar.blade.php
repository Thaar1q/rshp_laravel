<html lang="en" data-theme="light">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/pico.yellow.min.css">
</head>

<body>
	<div class="container">
		<header>
			<nav style="postion: sticky; top: 0">
				<ul>
					<li><a href="{{ route('home') }}"><strong>RSHP</strong></a></li>
				</ul>
				<ul>
					<li><a href="{{ route('layanan') }}">Layanan</a></li>
					<li><a href="{{ route('kontak') }}">Kontak</a></li>
					<li><a href="{{ route('organisasi') }}">Struktur Organisasi</a></li>
					<li>
						@auth
							@php
								$role = strtolower(Auth::user()->roleUser->first()->role->nama_role ?? '');
								$prefix = match ($role) {
									'administrator' => 'admin',
									'dokter' => 'dokter',
									'perawat' => 'perawat',
									'resepsionis' => 'resepsionis',
									'pemilik' => 'pemilik',
									default => null,
								};
							  @endphp

							@if($prefix)
								<details class="dropdown">
									<summary>{{ Auth::user()->nama }}</summary>
									<ul>
										<li><a href="{{ route($prefix . '.dashboard') }}">Dashboard</a></li>
										<li>
											<form action="{{ route('logout') }}" method="POST">@csrf
												<a href="#"
													onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
											</form>
										</li>
									</ul>
								</details>
							@endif
						@else
							<a href="{{ route('login') }}">Login</a>
						@endauth
					</li>
				</ul>
			</nav>
		</header>
	</div>
</body>

</html>