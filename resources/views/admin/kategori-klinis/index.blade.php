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
                <p class="short"><a data-target="tambahKategoriKlinis" onclick="tambahKategoriKlinis.showModal()">Tambah
                        Kategori Klinis</a></p>
                <dialog id="tambahKategoriKlinis">
                    <form method="post" action="{{ route('admin.kategori-klinis.store') }}">
                        @csrf
                        <h1 style="text-align:center">Tambah Kategori Klinis</h1>
                        <input name="nama_kategori_klinis">
                        <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                            <button type="button" onclick="tambahKategoriKlinis.close()">Cancel</button>
                            <button type="submit">Simpan</button>
                        </div>
                    </form>
                </dialog>
            </div>
        </section>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori Klinis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $kategori)
                    <tr>
                        <td>{{ $kategori->idkategori_klinis }}</td>
                        <td>{{ $kategori->nama_kategori_klinis }}</td>
                        <td>
                            <a onclick="editKategoriKlinis{{ $kategori->idkategori_klinis }}.showModal()">Edit</a>
                            <a onclick="hapusKategoriKlinis{{ $kategori->idkategori_klinis }}.showModal()">Hapus</a>

                            <dialog id="editKategoriKlinis{{ $kategori->idkategori_klinis }}">
                                <form method="post"
                                    action="{{ route('admin.kategori-klinis.edit', $kategori->idkategori_klinis) }}">
                                    @csrf
                                    <h1 style="text-align:center">Edit Kategori Klinis</h1>
                                    <input name="nama_kategori_klinis" value="{{ $kategori->nama_kategori_klinis }}">
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="editKategoriKlinis{{ $kategori->idkategori_klinis }}.close()">Cancel</button>
                                        <button type="submit">Simpan</button>
                                    </div>
                                </form>
                            </dialog>

                            <dialog id="hapusKategoriKlinis{{ $kategori->idkategori_klinis }}">
                                <form method="post"
                                    action="{{ route('admin.kategori-klinis.delete', $kategori->idkategori_klinis) }}">
                                    @csrf
                                    <h1 style="text-align:center">Hapus Kategori Klinis</h1>
                                    <p>Yakin ingin menghapus <strong>{{ $kategori->nama_kategori_klinis }}</strong>?</p>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="hapusKategoriKlinis{{ $kategori->idkategori_klinis }}.close()">Cancel</button>
                                        <button type="submit">Simpan</button>
                                    </div>
                                </form>
                            </dialog>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>