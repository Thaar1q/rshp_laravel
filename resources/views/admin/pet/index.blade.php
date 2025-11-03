@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Pet - Admin Dashboard</title>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data Pet</h1>
                <p class="short"><a data-target="tambahPet" onclick="tambahPet.showModal()">Tambah Pet</a></p>
                <dialog id="tambahPet">
                    <form method="post" action="{{ route('admin.pet.store') }}">
                        @csrf
                        <h2>Tambah Pet</h2>
                        <label>Nama Pet</label>
                        <input name="nama">

                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin">
                            <option value="J">Jantan</option>
                            <option value="B">Betina</option>
                        </select>

                        <label>Ras</label>
                        <select name="idras_hewan">
                            @foreach($ras as $r)
                                <option value="{{ $r->idras_hewan }}"
                                    data-jenis="{{ $r->jenisHewan->nama_jenis_hewan ?? '' }}">
                                    {{ $r->nama_ras }}
                                </option>
                            @endforeach
                        </select>

                        <label>Jenis Hewan</label>
                        <input id="inputJenisHewan" disabled value="{{ $selectedJenis ?? '' }}">

                        <label>Pemilik</label>
                        <select name="idpemilik">
                            @foreach($pemilik as $p)
                                <option value="{{ $p->idpemilik }}">{{ $p->user->nama }}</option>
                            @endforeach
                        </select>

                        <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                            <button type="button" onclick="tambahPet.close()">Cancel</button>
                            <button type="submit">Simpan</button>
                        </div>
                    </form>
                </dialog>
            </div>
        </section>

        <table>
            <thead>
                <tr>
                    <th>Nama Pet</th>
                    <th>Jenis Kelamin</th>
                    <th>Ras</th>
                    <th>Jenis Hewan</th>
                    <th>Pemilik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $pet)
                    <tr>
                        <td>{{ $pet->nama }}</td>
                        <td>{{ $pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}</td>
                        <td>{{ $pet->rasHewan->nama_ras ?? '-' }}</td>
                        <td>{{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                        <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                        <td>
                            <a onclick="editPet{{ $pet->idpet }}.showModal()">Edit</a>
                            <a onclick="hapusPet{{ $pet->idpet }}.showModal()">Hapus</a>

                            <dialog id="editPet{{ $pet->idpet }}">
                                <form method="post" action="{{ route('admin.pet.edit', $pet->idpet) }}">
                                    @csrf
                                    <h1 style="text-align:center">Edit Pet</h1>
                                    <label>Nama Pet</label>
                                    <input name="nama" value="{{ $pet->nama }}">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin">
                                        <option value="J" {{ $pet->jenis_kelamin == 'J' ? 'selected' : '' }}>Jantan</option>
                                        <option value="B" {{ $pet->jenis_kelamin == 'B' ? 'selected' : '' }}>Betina</option>
                                    </select>
                                    <label>Ras</label>
                                    <select name="idras_hewan">
                                        @foreach($ras as $r)
                                            <option value="{{ $r->idras_hewan }}" {{ $r->idras_hewan == $pet->idras_hewan ? 'selected' : '' }}>
                                                {{ $r->nama_ras }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>Pemilik</label>
                                    <select name="idpemilik">
                                        @foreach($pemilik as $p)
                                            <option value="{{ $p->idpemilik }}" {{ $p->idpemilik == $pet->idpemilik ? 'selected' : '' }}>
                                                {{ $p->user->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button" onclick="editPet{{ $pet->idpet }}.close()">Cancel</button>
                                        <button type="submit">Simpan</button>
                                    </div>
                                </form>
                            </dialog>

                            <dialog id="hapusPet{{ $pet->idpet }}">
                                <form method="post" action="{{ route('admin.pet.delete', $pet->idpet) }}">
                                    @csrf
                                    <h1 style="text-align:center">Hapus Pet</h1>
                                    <p>Yakin ingin menghapus pet <strong>{{ $pet->nama }}</strong>?</p>
                                    <div style="display:flex;justify-content:flex-end;gap:0.5rem;margin-top:1rem;">
                                        <button type="button" onclick="hapusPet{{ $pet->idpet }}.close()">Cancel</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rasSelect = document.querySelector('select[name="idras_hewan"]');
        const inputJenis = document.getElementById('inputJenisHewan');
        function updateJenis() {
            const opt = rasSelect.options[rasSelect.selectedIndex];
            const jenis = opt.dataset.jenis ?? '';
            inputJenis.value = jenis || '-';
        }
        if (rasSelect) {
            rasSelect.addEventListener('change', updateJenis);
            updateJenis();
        }
    });
</script>

</html>