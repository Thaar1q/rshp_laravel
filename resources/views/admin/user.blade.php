@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>User - Admin Dashboard</title>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data User</h1>
            </div>
        </section>

        <table role="grid">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->iduser }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nama_role ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>