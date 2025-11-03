@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Jenis Hewan - Admin Dashboard</title>
</head>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data Jenis Hewan</h1>
                <p class="short">
                    <a data-target="tambahJenis" onclick="tambahJenis.showModal()">Tambah Jenis Hewan</a>
                </p>
                <dialog id="tambahJenis">
                    <form method="post" action="{{ route('admin.jenis-hewan.store') }}">
                        @csrf
                        <h2>Tambah Jenis Hewan</h2>
                        <input name="nama_jenis_hewan">
                        <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                            <button type="button" onclick="tambahJenis.close()">Cancel</button>
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
                    <th>Nama Jenis Hewan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $jenis)
                    <tr>
                        <td>{{ $jenis->idjenis_hewan }}</td>
                        <td>{{ $jenis->nama_jenis_hewan }}</td>
                        <td>
                            <a onclick="editJenis{{ $jenis->idjenis_hewan }}.showModal()">Edit</a>
                            <a onclick="hapusJenis{{ $jenis->idjenis_hewan }}.showModal()">Hapus</a>

                            <dialog id="editJenis{{ $jenis->idjenis_hewan }}">
                                <form method="post" action="{{ route('admin.jenis-hewan.edit', $jenis->idjenis_hewan) }}">
                                    @csrf
                                    <h1 style="text-align:center">Edit Jenis Hewan</h1>
                                    <input name="nama_jenis_hewan" value="{{ $jenis->nama_jenis_hewan }}">
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="editJenis{{ $jenis->idjenis_hewan }}.close()">Cancel</button>
                                        <button type="submit">Simpan</button>
                                    </div>
                                </form>
                            </dialog>

                            <dialog id="hapusJenis{{ $jenis->idjenis_hewan }}">
                                <form method="post" action="{{ route('admin.jenis-hewan.delete', $jenis->idjenis_hewan) }}">
                                    @csrf
                                    <h1 style="text-align:center">Hapus Jenis Hewan</h1>
                                    <p>Yakin ingin menghapus <strong>{{ $jenis->nama_jenis_hewan }}</strong>?</p>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="hapusJenis{{ $jenis->idjenis_hewan }}.close()">Cancel</button>
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