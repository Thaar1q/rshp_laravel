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
                <p class="short"><a data-target="tambahKode" onclick="tambahKode.showModal()">Tambah Kode Tindakan</a>
                </p>
                <dialog id="tambahKode">
                    <form method="post" action="{{ route('admin.kode-tindakan.store') }}">
                        @csrf
                        <h1 style="text-align:center">Tambah Kode Tindakan</h1>
                        <label>Kode</label>
                        <input name="kode">
                        <label>Deskripsi Tindakan</label>
                        <input name="deskripsi_tindakan_terapi">
                        <label>Kategori Klinis</label>
                        <select name="idkategori_klinis">
                            @foreach($kategori as $k)
                                <option value="{{ $k->idkategori_klinis }}">{{ $k->nama_kategori_klinis }}</option>
                            @endforeach
                        </select>
                        <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                            <button type="button" onclick="tambahKode.close()">Cancel</button>
                            <button type="submit">Simpan</button>
                        </div>
                    </form>
                </dialog>
            </div>
        </section>

        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Deskripsi Tindakan</th>
                    <th>Kategori Klinis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $kode)
                    <tr>
                        <td>{{ $kode->kode }}</td>
                        <td>{{ $kode->deskripsi_tindakan_terapi }}</td>
                        <td>{{ $kode->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
                        <td>
                            <a onclick="editKode{{ $kode->idkode_tindakan_terapi }}.showModal()">Edit</a>
                            <a onclick="hapusKode{{ $kode->idkode_tindakan_terapi }}.showModal()">Hapus</a>

                            <dialog id="editKode{{ $kode->idkode_tindakan_terapi }}">
                                <form method="post"
                                    action="{{ route('admin.kode-tindakan.edit', ['kode' => $kode->idkode_tindakan_terapi]) }}">
                                    @csrf
                                    <h1 style="text-align:center">Edit Kode Tindakan</h1>
                                    <input name="kode" value="{{ $kode->kode }}">
                                    <input name="deskripsi_tindakan_terapi" value="{{ $kode->deskripsi_tindakan_terapi }}">
                                    <select name="idkategori_klinis">
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->idkategori_klinis }}" {{ $k->idkategori_klinis == $kode->idkategori_klinis ? 'selected' : '' }}>
                                                {{ $k->nama_kategori_klinis }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="document.getElementById('editKode{{ $kode->idkode_tindakan_terapi }}').close()">Cancel</button>
                                        <button type="submit">Simpan</button>
                                    </div>
                                </form>
                            </dialog>

                            <dialog id="hapusKode{{ $kode->idkode_tindakan_terapi }}">
                                <form method="post"
                                    action="{{ route('admin.kode-tindakan.delete', ['kode' => $kode->idkode_tindakan_terapi]) }}">
                                    @csrf
                                    <h1 style="text-align:center">Hapus Kode Tindakan</h1>
                                    <p>Yakin ingin menghapus <strong>{{ $kode->deskripsi_tindakan_terapi }}</strong>?</p>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="document.getElementById('hapusKode{{ $kode->idkode_tindakan_terapi }}').close()">Cancel</button>
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