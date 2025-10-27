@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Kode Tindakan - Admin Dashboard</title>
</head>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data Kode Tindakan Terapi</h1>
            </div>
        </section>

        <table role="grid">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Tindakan</th>
                    <th>Kategori Klinis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $tindakan)
                    <tr>
                        <td>{{ $t->idkode_tindakan_terapi }}</td>
                        <td>{{ $t->kode }}</td>
                        <td>{{ $t->deskripsi_tindakan_terapi }}</td>
                        <td>{{ $t->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $t->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>