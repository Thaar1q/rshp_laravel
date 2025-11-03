@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Dashboard Admin - RSHP UNAIR</title>
</head>
<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Welcome</h1>
                <p class="lead">Anda sekarang berada di dashboard Admin.</p>
            </div>
        </section>

        <!-- Grid Menu -->
        <section class="services-grid" aria-label="Menu Admin - Grid">
            <article class="service-card" aria-labelledby="m-user">
                <h4 id="m-user">User</h4>
                <p class="short">User & role terkait.</p>
                <small class="muted"><a href="{{ route('admin.user.index') }}">Lihat Data</a></small>
            </article>

            <article class="service-card" aria-labelledby="m-role">
                <h4 id="m-role">Role</h4>
                <p class="short">Peran pengguna RSHP.</p>
                <small class="muted"><a href="{{ route('admin.role.index') }}">Lihat Data</a></small>
            </article>

            <article class="service-card" aria-labelledby="m-pet">
                <h4 id="m-pet">Pet</h4>
                <p class="short">Data hewan peliharaan.</p>
                <small class="muted"><a href="{{ route('admin.pet.index') }}">Lihat Data</a></small>
            </article>

            <article class="service-card" aria-labelledby="m-jenis-hewan">
                <h4 id="m-jenis-hewan">Jenis Hewan</h4>
                <p class="short">List jenis hewan terdaftar.</p>
                <small class="muted"><a href="{{ route('admin.jenis-hewan.index') }}">Lihat Data</a></small>
            </article>

            <article class="service-card" aria-labelledby="m-ras-hewan">
                <h4 id="m-ras-hewan">Ras Hewan</h4>
                <p class="short">Ras berdasarkan jenis.</p>
                <small class="muted"><a href="{{ route('admin.ras-hewan.index') }}">Lihat Data</a></small>
            </article>

            <article class="service-card" aria-labelledby="m-kategori">
                <h4 id="m-kategori">Kategori</h4>
                <p class="short">Kategori tindakan klinis.</p>
                <small class="muted"><a href="{{ route('admin.kategori.index') }}">Lihat Data</a></small>
            </article>

            <article class="service-card" aria-labelledby="m-kategori-klinis">
                <h4 id="m-kategori-klinis">Kategori Klinis</h4>
                <p class="short">Klasifikasi terapi / tindakan.</p>
                <small class="muted"><a href="{{ route('admin.kategori-klinis.index') }}">Lihat Data</a></small>
            </article>

            <article class="service-card" aria-labelledby="m-kode-tindakan">
                <h4 id="m-kode-tindakan">Kode Tindakan Terapi</h4>
                <p class="short">Kode & deskripsi tindakan.</p>
                <small class="muted"><a href="{{ route('admin.kode-tindakan.index') }}">Lihat Data</a></small>
            </article>
        </section>
    </main>
</body>
</html>