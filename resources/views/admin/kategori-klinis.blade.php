@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Kategori Klinis - Admin Dashboard</title>
</head>
</head>
    <body>
        <main class="container">
            <section class="hero">
                <div class="center-row">
                    <h1>Data Kategori Klinis</h1>
                </div>
            </section>

            <table role="grid">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori Klinis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $klinis)
                        <tr>
                            <td>{{ $klinis->idkategori_klinis }}</td>
                            <td>{{ $klinis->nama_kategori_klinis }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </body>
</html>
</html>