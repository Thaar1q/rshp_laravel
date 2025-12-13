@include('site.navbar')

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Kontak - RSHP UNAIR</title>
</head>

<body>
    <main class="container">
        <h2>Kontak & Lokasi</h2>

        <div style="display:grid; gap:1rem;">
            <div class="map-wrapper" aria-hidden="false">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.0196885531292!2d112.78714369310941!3d-7.2703967117540245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sRumah%20Sakit%20Hewan%20Pendidikan%20Universitas%20Airlangga!5e0!3m2!1sid!2sid!4v1757469135795!5m2!1sid!2sid"
                    title="Lokasi RSHP UNAIR" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="contact-card">
                <h3>Informasi Kontak</h3>
                <p><strong>Telepon:</strong> <a href="tel:+62315927832">031 5927832</a></p>
                <p><strong>Email:</strong> <a href="mailto:rshp@fkh.unair.ac.id">rshp@fkh.unair.ac.id</a></p>
            </div>
        </div>
    </main>
</body>

</html>
