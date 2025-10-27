@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Role - Admin Dashboard</title>
</head>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data Role</h1>
            </div>
        </section>

        <table role="grid">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $role)
                    <tr>
                        <td>{{ $role->idrole }}</td>
                        <td>{{ $role->nama_role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>