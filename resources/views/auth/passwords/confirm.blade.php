@include('navbar.site')

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="/css/pico.yellow.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  <title>Konfirmasi Password - RSHP UNAIR</title>
</head>
<body>
  <main class="login-page">
    <section class="login-card">
      <h2>Konfirmasi Password</h2>
      <p class="muted">Sebelum melanjutkan, masukkan password akun Anda.</p>

      <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">

        <div style="display:flex;justify-content:space-between;align-items:center;">
          <a href="{{ route('login') }}">Batal</a>
          <button type="submit" class="contrast">Konfirmasi</button>
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