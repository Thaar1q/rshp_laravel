@include('site.navbar')

<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="/css/pico.yellow.min.css">
	<link rel="stylesheet" href="/css/custom.css">
	<title>Layanan - RSHP UNAIR</title>

</head>

<body>
	<main class="container">
		<h2>Layanan Kami</h2>
		<p class="muted">Pelayanan klinis, bedah, diagnostik, perawatan, dan grooming untuk hewan.</p>

		<!-- GRID 1: tiga layanan -->
		<section class="services-grid" aria-label="Layanan utama - grid 1">
			<!-- Poliklinik -->
			<article class="service-card" aria-labelledby="s-poli">
				<span class="service-badge">Klinis</span>
				<h4 id="s-poli">Poliklinik</h4>
				<p class="short">Rawat jalan untuk observasi, diagnosis, dan pengobatan tanpa menginap. Cocok untuk
					konsultasi,
					vaksinasi, dan perawatan ringan.</p>
				<small class="muted">Fitur: rawat jalan, vaksinasi; sitologi, dermatologi, hematologi; radiologi, USG,
					EKG.</small>
			</article>

			<!-- Rawat Inap -->
			<article class="service-card" aria-labelledby="s-inap">
				<span class="service-badge">Perawatan</span>
				<h4 id="s-inap">Rawat Inap</h4>
				<p class="short">Perawatan intensif dan observasi lanjutan di bawah pengawasan dokter & paramedis.</p>
				<small class="muted">Catatan: Persetujuan (informed consent) klien wajib sebelum tindakan.</small>
			</article>

			<!-- -->
			<article class="service-card" aria-labelledby="s-bedah">
				<span class="service-badge">Bedah</span>
				<h4 id="s-bedah">Bedah</h4>
				<p class="short">Prosedur bedah minor hingga mayor dengan tim dan fasilitas lengkap.</p>
				<details>
					<summary><small>Ringkasan</small></summary>
					<small class="muted">Minor: jahit luka, kastrasi, othematoma, scaling/root planing, ekstraksi
						gigi.</small>
					<br><br>
					<small class="muted">Mayor: operasi abdomen, OHE, sectio caesar, perbaikan fraktur, eksisi tumor,
						hernia.</small>
				</details>
			</article>
		</section>

		<hr>

		<!-- GRID 2: dua layanan (1 biasa, 1 besar gabungan grooming) -->
		<section class="services-grid" aria-label="Layanan penunjang - grid 2">
			<!-- Pemeriksaan Laboratorium & Imaging (normal) -->
			<article class="service-card" aria-labelledby="s-lab">
				<span class="service-badge">Diagnostik</span>
				<h4 id="s-lab">Pemeriksaan Laboratorium & Imaging</h4>
				<p class="short">Pemeriksaan diagnostik untuk menegakkan atau memantau kondisi kesehatan hewan.</p>
				<small class="muted">Jenis: sitologi, dermatologi, hematologi, radiografi, ultrasonografi.</small>
			</article>

			<!-- Grooming besar: gabungan Kucing & Anjing -->
			<article class="service-card span-2" aria-labelledby="s-groom">
				<span class="service-badge">Grooming</span>
				<h4 id="s-groom">Grooming — Kucing & Anjing</h4>
				<p class="short">Perawatan estetika dan kesehatan dasar; satu layanan terintegrasi dengan layanan
					terpisah
					per-species.</p>

				<div
					style="display:grid; gap:0.75rem; grid-template-columns: repeat(auto-fit,minmax(160px,1fr)); margin-top:0.5rem;">
					<section>
						<h5 style="margin:0 0 0.25rem;">Kucing</h5>
						<p class="muted">Perawatan kebersihan dan deteksi dini masalah kulit/kuku.</p>
						<ul style="margin:0.25rem 0 0; padding-left:1rem;">
							<li>Menyisir / menyikat</li>
							<li>Mandi dengan shampoo khusus</li>
							<li>Perawatan kuku & pemeriksaan kaki</li>
						</ul>
					</section>

					<section>
						<h5 style="margin:0 0 0.25rem;">Anjing</h5>
						<p class="muted">Perawatan rutin disesuaikan jenis & gaya hidup anjing.</p>
						<ul style="margin:0.25rem 0 0; padding-left:1rem;">
							<li>Mandi & kondisioner anti-kusut</li>
							<li>Menyisir / penyikatan rutin</li>
							<li>Pemotongan / perawatan kuku</li>
						</ul>
					</section>
				</div>
			</article>
		</section>
	</main>
</body>

</html>