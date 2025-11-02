@include('navbar.role')

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Data Temu Dokter - Resepsionis Dashboard</title>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data Temu Dokter</h1>
            </div>
        </section>
        <table role="grid">
            <thead>
                <tr>
                    <th>Pet</th>
                    <th>Dokter</th>
                    <th>Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($temudokter as $t)
                    <tr>
                        <td>{{ $t->pet->nama ?? '-' }}</td>
                        <td>{{ $t->roleUser->user->nama ?? '-' }}</td>
                        <td>{{ $t->waktu_daftar }}</td>
                        <td>{{ $t->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>