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
                <p class="short"><a data-target="tambahKategori" onclick="tambahKategori.showModal()">Tambah
                        Kategori</a></p>
                <dialog id="tambahKategori">
                    <form method="post" action="{{ route('admin.kategori.store') }}">
                        @csrf
                        <h1 style="text-align:center">Tambah Kategori</h1>
                        <input name="nama_kategori">
                        <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                            <button type="button" onclick="tambahKategori.close()">Cancel</button>
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
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $kategori)
                    <tr>
                        <td>{{ $kategori->idkategori }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>
                            <a onclick="editKategori{{ $kategori->idkategori }}.showModal()">Edit</a>
                            <a onclick="hapusKategori{{ $kategori->idkategori }}.showModal()">Hapus</a>

                            <dialog id="editKategori{{ $kategori->idkategori }}">
                                <form method="post" action="{{ route('admin.kategori.edit', $kategori->idkategori) }}">
                                    @csrf
                                    <h1 style="text-align:center">Edit Kategori</h1>
                                    <input name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="editKategori{{ $kategori->idkategori }}.close()">Cancel</button>
                                        <button type="submit">Simpan</button>
                                    </div>
                                </form>
                            </dialog>

                            <dialog id="hapusKategori{{ $kategori->idkategori }}">
                                <form method="post" action="{{ route('admin.kategori.delete', $kategori->idkategori) }}">
                                    @csrf
                                    <h1 style="text-align:center">Hapus Kategori</h1>
                                    <p>Yakin ingin menghapus kategori <strong>{{ $kategori->nama_kategori }}</strong>?</p>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="hapusKategori{{ $kategori->idkategori }}.close()">Cancel</button>
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