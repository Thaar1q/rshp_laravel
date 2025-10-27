@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Kategori - Admin Dashboard</title>
</head>
</head>
    <body>
        <main class="container">
            <section class="hero">
                <div class="center-row">
                    <h1>Data Kategori</h1>
                </div>
            </section>

            <table role="grid">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $kategori)
                        <tr>
                            <td>{{ $kategori->idkategori }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </body>
</html>
</html>