@include('site.navbar')

<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="/css/pico.yellow.min.css">
	<link rel="stylesheet" href="/css/custom.css">
	<title>Register - RSHP UNAIR</title>
</head>

<body>
	<main class="login-page">
		<section class="login-card">
			<h2>
				<center>Daftar Akun</center>
			</h2>

			<form method="POST" action="{{ route('register') }}">
				@csrf

				<input id="nama" type="text" placeholder="Nama" name="nama" value="{{ old('nama') }}" required
					autofocus>
				<input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
				<input id="password" type="password" placeholder="Password" name="password" required
					autocomplete="new-password">
				<input id="password_confirmation" type="password" placeholder="Konfirmasi Password"
					name="password_confirmation" required>

				<button type="submit" class="contrast">Daftar</button>

				<div style="display:flex; justify-content:space-between; align-items:center; gap:.5rem;">
					<a href="{{ route('login') }}">Sudah punya akun?</a>
				</div>

				@if ($errors->any())
					<div class="muted" style="color:var(--pico-del-color);margin-top:0.5rem;">
						{{ $errors->first() }}
					</div>
				@endif
			</form>
		</section>
	</main>
</body>

</html>