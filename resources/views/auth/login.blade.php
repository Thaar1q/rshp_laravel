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

    </style>
</head>

<body>
    <main class="login-page">
        <section class="login-card">
            <h2>
                <center>Login Akun</center>
            </h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required
                    autocomplete="email" autofocus>
                <input id="password" type="password" placeholder="Password" name="password" required
                    autocomplete="current-password">

                <div class="form-foot">
                    <label style="display:flex;align-items:center;gap:.5rem;">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Remember me</span>
                    </label>

                    <button type="submit" class="contrast">Masuk</button>

                    <div class="muted" style="font-size:0.95rem;">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        @endif
                    </div>
                </div>

                @if ($errors->any())
                    <div class="muted" style="color:var(--pico-del-color);margin-top:0.5rem;">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>

            <hr style="margin:1rem 0;">

            <p class="muted" style="font-size:0.95rem;">Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
            </p>
        </section>
    </main>
</body>

</html>