@php
$role = session('role') ?? strtolower(Auth::user()->roleUser->role->nama_role ?? '');
@endphp

<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.yellow.min.css">
    <title>Navbar Role - RSHP UNAIR</title>
</head>
<body>
    <div class="container">
        <header>
            <nav style="postion: sticky; top: 0">
                <ul>
                    <li><strong>RSHP</strong></li>
                </ul>
                <ul>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline;"> @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>

                    <details class="dropdown">
                        <summary style="color: #746c01">Menu</summary>
                        <ul dir="rtl" style="text-align: left">
                            @switch(strtolower($role))
                            @case('administrator')
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('admin.user') }}">Data User</a></li>
                                <li><a href="{{ route('admin.role') }}">Data Role</a></li>
                                <li><a href="{{ route('admin.pet') }}">Data Pet</a></li>
                                <li><a href="{{ route('admin.jenis-hewan') }}">Data Jenis Hewan</a></li>
                                <li><a href="{{ route('admin.ras-hewan') }}">Data Ras Hewan</a></li>
                                <li><a href="{{ route('admin.kategori') }}">Data Kategori</a></li>
                                <li><a href="{{ route('admin.kategori-klinis') }}">Data Kategori Klinis</a></li>
                                <li><a href="{{ route('admin.kode-tindakan') }}">Data Kode Tindakan</a></li>
                                @break

                            @case('dokter')
                                <li><a href="{{ route('dokter.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('dokter.rekam-medis') }}">Rekam Medis</a></li>
                                @break

                            @case('pemilik')
                                <li><a href="{{ route('pemilik.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('pemilik.pets') }}">Pet Saya</a></li>
                                <li><a href="{{ route('pemilik.rekam-medis') }}">Rekam Medis Saya</a></li>
                                <li><a href="{{ route('pemilik.reservasi') }}">Reservasi Saya</a></li>
                                @break

                            @case('perawat')
                                <li><a href="{{ route('perawat.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('perawat.rekam-medis') }}">Rekam Medis</a></li>
                                @break

                            @case('resepsionis')
                                <li><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('resepsionis.pemilik') }}">Data Pemilik</a></li>
                                <li><a href="{{ route('resepsionis.pets') }}">Data Pet</a></li>
                                <li><a href="{{ route('resepsionis.temu-dokter') }}">Data Temu Dokter</a></li>
                                @break
                            @endswitch
                        </ul>
                    </details>
                </ul>
            </nav>
        </header>
    </div>
</body>
</html>