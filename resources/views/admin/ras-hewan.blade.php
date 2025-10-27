@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Ras Hewan - Admin Dashboard</title>
</head>
</head>
    <body>
        <main class="container">
            <section class="hero">
                <div class="center-row">
                    <h1>Data Ras Hewan</h1>
                </div>
            </section>

            <table role="grid">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Ras</th>
                        <th>Jenis Hewan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $ras)
                        <tr>
                            <td>{{ $ras->idras_hewan }}</td>
                            <td>{{ $ras->nama_ras }}</td>
                            <td>{{ $ras->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </body>
</html>
</html>