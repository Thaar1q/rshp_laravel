@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Ras Hewan - Admin Dashboard</title>
</head>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data Ras Hewan</h1>
                <p class="short"><a data-target="tambahRas" onclick="tambahRas.showModal()">Tambah Ras Hewan</a></p>
                <dialog id="tambahRas">
                    <form method="post" action="{{ route('admin.ras-hewan.store') }}">
                        @csrf
                        <h1 style="text-align:center">Tambah Ras Hewan</h1>
                        <label>Nama Ras</label>
                        <input name="nama_ras">
                        <label>Jenis Hewan</label>
                        <select name="idjenis_hewan">
                            @foreach($jenis as $j)
                                <option value="{{ $j->idjenis_hewan }}">{{ $j->nama_jenis_hewan }}</option>
                            @endforeach
                        </select>
                        <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                            <button type="button" onclick="tambahRas.close()">Cancel</button>
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
                    <th>Nama Ras</th>
                    <th>Jenis Hewan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $ras)
                    <tr>
                        <td>{{ $ras->idras_hewan }}</td>
                        <td>{{ $ras->nama_ras }}</td>
                        <td>{{ $ras->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                        <td>
                            <a onclick="editRas{{ $ras->idras_hewan }}.showModal()">Edit</a>
                            <a onclick="hapusRas{{ $ras->idras_hewan }}.showModal()">Hapus</a>

                            <dialog id="editRas{{ $ras->idras_hewan }}">
                                <form method="post" action="{{ route('admin.ras-hewan.edit', $ras->idras_hewan) }}">
                                    @csrf
                                    <h1 style="text-align:center">Edit Ras Hewan</h1>
                                    <input name="nama_ras" value="{{ $ras->nama_ras }}">
                                    <select name="idjenis_hewan">
                                        @foreach($jenis as $j)
                                            <option value="{{ $j->idjenis_hewan }}" {{ $j->idjenis_hewan == $ras->idjenis_hewan ? 'selected' : '' }}>
                                                {{ $j->nama_jenis_hewan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="editRas{{ $ras->idras_hewan }}.close()">Cancel</button>
                                        <button type="submit">Simpan</button>
                                    </div>
                                </form>
                            </dialog>

                            <dialog id="hapusRas{{ $ras->idras_hewan }}">
                                <form method="post" action="{{ route('admin.ras-hewan.delete', $ras->idras_hewan) }}">
                                    @csrf
                                    <h1 style="text-align:center">Hapus Ras Hewan</h1>
                                    <p>Yakin ingin menghapus ras <strong>{{ $ras->nama_ras }}</strong>?</p>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button"
                                            onclick="hapusRas{{ $ras->idras_hewan }}.close()">Cancel</button>
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