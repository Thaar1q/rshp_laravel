@include('navbar.site')

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="/css/pico.yellow.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  <title>Verifikasi Email - RSHP UNAIR</title>
</head>
<body>
  <main class="login-page">
    <section class="login-card">
      <h2>Verifikasi Email</h2>
      <p class="muted">Sebuah tautan verifikasi telah dikirim ke alamat email Anda. Periksa inbox atau spam.</p>

      @if (session('status') == 'verification-link-sent')
        <p class="muted" style="color:green">Tautan verifikasi baru telah dikirim.</p>
      @endif

      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div style="display:flex;justify-content:space-between;align-items:center;">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <button type="submit" class="contrast">Kirim ulang tautan</button>
        </div>
      </form>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
      </form>
    </section>
  </main>
</body>
</html>