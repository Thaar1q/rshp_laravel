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
    <section class="login-card">
      <h2>Lupa Password</h2>
      <p class="muted">Masukkan email Anda, kami akan mengirim tautan untuk mereset password.</p>

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

        <button type="submit" class="contrast">Kirim tautan</button>

        <div style="display:flex;justify-content:space-between;align-items:center;">
          <a href="{{ route('login') }}">Kembali ke login</a>
        </div>

        @if (session('status'))
          <p class="muted" style="color:green;margin-top:.5rem;">{{ session('status') }}</p>
        @endif
      </form>
    </section>
  </main>
</body>
</html>