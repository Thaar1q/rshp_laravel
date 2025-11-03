@include('navbar.role')

<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pico.yellow.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>User - Admin Dashboard</title>
</head>

<body>
    <main class="container">
        <section class="hero">
        <div class="center-row">
            <h1>Data User</h1>
            <p class="short"><a data-target="tambahUser" onclick="tambahUser.showModal()">Tambah User</a></p>
            <dialog id="tambahUser">
                <form method="post" action="{{ route('admin.user.store') }}">
                    @csrf
                    <h2>Tambah User</h2>
                    <label>Nama <input name="nama"></label>
                    <label>Email <input type="email" name="email"></label>
                    <label>Password <input type="password" name="password"></label>
                    <label>Role
                        <select name="idrole">
                            @foreach($roles as $r)
                                <option value="{{ $r->idrole }}">{{ $r->nama_role }}</option>
                            @endforeach
                        </select>
                    </label>
                    <div style="display:flex; justify-content:flex-end; gap:0.5rem; margin-top:1rem;">
                        <button type="button" onclick="tambahUser.close()">Cancel</button>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $user)
                    <tr>
                        <td>{{ $user->iduser }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $r)
                                <a href="{{ route('admin.user.role.toggle', [$user->iduser, $r->idrole]) }}"
                                onclick="event.preventDefault(); document.getElementById('toggleRole{{ $user->iduser }}_{{ $r->idrole }}').submit();"
                                style="color:black; text-decoration:none;">
                                    {{ $r->nama_role }} <i>({{ $r->pivot->status ? 'aktif' : 'nonaktif' }})</i>
                                </a>
                                <form id="toggleRole{{ $user->iduser }}_{{ $r->idrole }}" method="post" 
                                    action="{{ route('admin.user.role.toggle', [$user->iduser, $r->idrole]) }}" style="display:none;">
                                    @csrf
                                </form>
                                @if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>
                            <a onclick="editUser{{ $user->iduser }}.showModal()">Edit</a>
                            <a onclick="hapusUser{{ $user->iduser }}.showModal()">Hapus</a>

                            <dialog id="editUser{{ $user->iduser }}">
                                <form method="post" action="{{ route('admin.user.edit',$user->iduser) }}">
                                    @csrf
                                    <h2>Edit User</h2>
                                    <label>Nama <input name="nama" value="{{ $user->nama }}"></label>
                                    <label>Email <input name="email" value="{{ $user->email }}"></label>
                                    <label>Role
                                        <select name="idrole[]" multiple size="4">
                                            @foreach($roles as $r)
                                                <option value="{{ $r->idrole }}" 
                                                    {{ in_array($r->idrole, $user->roles->pluck('idrole')->toArray()) ? 'selected' : '' }}>
                                                    {{ $r->nama_role }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <p class="muted">Gunakan Ctrl/Command untuk memilih lebih dari satu role.</p>
                                    </label>
                                    <label>Status
                                        <select name="aktif">
                                            <option value="1" {{ $user->aktif ? 'selected' : '' }}>Aktif</option>
                                            <option value="0" {{ !$user->aktif ? 'selected' : '' }}>Nonaktif</option>
                                        </select>
                                    </label>
                                    <div style="display:flex; justify-content:flex-end; gap:0.5rem; margin-top:1rem;">
                                        <button type="button" onclick="editUser{{ $user->iduser }}.close()">Cancel</button>
                                        <button type="submit">Update</button>
                                    </div>
                                </form>
                            </dialog>
                            
                            <dialog id="hapusUser{{ $user->iduser }}">
                                <form method="post" action="{{ route('admin.user.delete',$user->iduser) }}">
                                    @csrf
                                    <h2>Hapus User</h2>
                                    <p>Yakin ingin menghapus user <strong>{{ $user->nama }}</strong>?</p>
                                    <div style="display:flex; justify-content:flex-end; gap:0.5rem; margin-top:1rem;">
                                        <button type="button" onclick="hapusUser{{ $user->iduser }}.close()">Cancel</button>
                                        <button type="submit">Hapus</button>
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