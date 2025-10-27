@include('navbar.site')

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="/css/pico.yellow.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  <title>Reset Password - RSHP UNAIR</title>
</head>
<body>
  <main class="login-page">
    <section class="auth-card">
      <h2>Reset Password</h2>
      <p class="muted">Masukkan password baru Anda.</p>

      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token ?? request()->route('token') }}">

        <label for="email">Email</label>
        <input id="email" type="email" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required autofocus>

        <label for="password">Password Baru</label>
        <input id="password" type="password" placeholder="Password" name="password" required autocomplete="new-password">

        <label for="password_confirmation">Konfirmasi Password</label>
        <input id="password_confirmation" type="password" placeholder="Konfirmasi Password" name="password_confirmation" required>

        <div style="display:flex;justify-content:space-between;align-items:center;">
          <a href="{{ route('login') }}">Kembali</a>
          <button type="submit" class="contrast">Reset Password</button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>