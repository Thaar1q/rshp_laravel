@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Pet - Admin Dashboard</title>
</head>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data Pet</h1>
            </div>
        </section>

        <table role="grid">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pet</th>
                    <th>Ras</th>
                    <th>Jenis Hewan</th>
                    <th>Pemilik</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pet)
                    <tr>
                        <td>{{ $pet->idpet }}</td>
                        <td>{{ $pet->nama }}</td>
                        <td>{{ $pet->rasHewan->nama_ras ?? '-' }}</td>
                        <td>{{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                        <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>