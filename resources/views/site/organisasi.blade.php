@include('site.navbar')

<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="/css/pico.yellow.min.css" />
	<link rel="stylesheet" href="/css/custom.css" />
	<title>Struktur Organisasi - RSHP UNAIR</title>
</head>

<body>
	<main class="container">
		<h1>Struktur Organisasi</h1>
		<p class="muted">Pimpinan inti Rumah Sakit Hewan Pendidikan</p>

		<section class="team-grid" aria-label="Pimpinan RSHP">
			{{-- Card 1 --}}
			<article class="team-card">
				<img src="/images/organisasi/dr. ira.jpg" alt="Foto Dr. Ira">
				<h4>Dr. Ira Sari Yudaniayanti, M.P., drh.</h4>
				<p class="role">Direktur</p>
			</article>

			{{-- Card 2 --}}
			<article class="team-card">
				<img src="/images/organisasi/dr. nusdianto.png" alt="Foto Dr. Nusdianto">
				<h4>Dr. Nusdianto Triakoso, M.P., drh.</h4>
				<p class="role">Wakil Direktur 1 - Pelayanan Medis, Pendidikan dan Penelitian</p>
			</article>

			{{-- Card 3 --}}
			<article class="team-card">
				<img src="/images/organisasi/dr. miyayu.png" alt="Foto Dr. Miyayu">
				<h4>Dr. Miyayu Soneta S., M.Vet., drh.</h4>
				<p class="role">Wakil Direktur 2 - Sumber Daya Manusia, Sarana Prasarana dan Keuangan</p>
			</article>
		</section>
	</main>
</body>

</html>