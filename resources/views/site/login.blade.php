@include('navbar.site')

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="/css/pico.yellow.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  <title>Login - RSHP UNAIR</title>

  <style>
    main.login-page {
      min-height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      max-width: 380px;
      width: 100%;
      padding: 2rem;
      border-radius: 12px;
      background: linear-gradient(180deg, #fffdf5, #fffaf0);
      box-shadow: 0 6px 18px rgba(0,0,0,0.05);
      text-align: center;
    }
    .login-card h2 { margin-bottom: 1rem; }
    form > *:not(:last-child) { margin-bottom: 0.75rem; }
  </style>
</head>
<body>
  <main class="login-page">
    <section class="login-card">
      <h2>Login Akun</h2>

      <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" aria-label="Email" autocomplete="email" required>
        <input type="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
        <button type="submit" class="contrast">Masuk</button>

        @if(session('error'))
          <small class="muted" style="color:var(--pico-del-color);">{{ session('error') }}</small>
        @endif
      </form>
    </section>
  </main>
</body>
</html>
