@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>Role - Admin Dashboard</title>
</head>
</head>

<body>
    <main class="container">
        <section class="hero">
            <div class="center-row">
                <h1>Data Role</h1>
                <p class="short">
                    <a data-target="tambahRole" onclick="tambahRole.showModal()">Tambah Role</a>
                </p>
                <dialog id="tambahRole">
                    <form method="post" action="{{ route('admin.role.store') }}">
                        @csrf
                        <h1>Tambah Role</h1>
                        <input name="nama_role">
                        <div style="display:flex; justify-content:flex-end; gap:0.5rem; margin-top:1rem;">
                            <button type="button" onclick="tambahRole.close()">Cancel</button>
                            <button type="submit">Simpan</button>
                        </div>
                    </form>
                </dialog>
            </div>
        </section>

        <table role="grid">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $role)
                    <tr>
                        <td>{{ $role->idrole }}</td>
                        <td>{{ $role->nama_role }}</td>
                        <td>
                            <a onclick="editRole{{ $role->idrole }}.showModal()">Edit</a>
                            <a onclick="hapusRole{{ $role->idrole }}.showModal()">Hapus</a>
                            
                            <dialog id="editRole{{ $role->idrole }}">
                                <form method="post" action="{{ route('admin.role.edit', $role->idrole) }}">
                                    @csrf
                                    <h1 style="text-align: center">Edit Role</h1>
                                    <input name="nama_role" value="{{ $role->nama_role }}">
                                    <div style="display:flex; justify-content:flex-end; gap:0.5rem; margin-top:1rem;">
                                        <button type="button" onclick="editRole{{ $role->idrole }}.close()">Cancel</button>
                                        <button type="submit">Simpan</button>
                                    </div>
                                </form>
                            </dialog>

                            <dialog id="hapusRole{{ $role->idrole }}">
                                <form method="post" action="{{ route('admin.role.delete', $role->idrole) }}">
                                    @csrf
                                    <h1 style="text-align: center">Hapus Role</h1>
                                    <p>Yakin ingin menghapus role <strong>{{ $role->nama_role }}</strong>?</p>
                                    <div style="display:flex; justify-content:flex-end; gap:0.5rem; margin-top:1rem;">
                                        <button type="button" onclick="hapusRole{{ $role->idrole }}.close()">Cancel</button>
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