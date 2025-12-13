@extends('layouts.lte.main')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Profil Saya</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="row">
                <!-- User Info Card -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-person-circle" style="font-size: 100px; color: #667eea;"></i>
                            </div>
                            <h4>{{ $user->nama }}</h4>
                            <p class="text-muted mb-3">{{ $user->email }}</p>
                            <div class="d-flex flex-wrap gap-1 justify-content-center">
                                @foreach ($activeRoles as $role)
                                    <span class="badge bg-primary">{{ ucfirst($role) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="col-md-8">
                    <!-- Basic Account Info -->
                    <div class="card mb-4">
                        <div class="card-header"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                            <h5 class="card-title mb-0"><i class="fas fa-user me-2"></i>Informasi Akun</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 200px">Nama Lengkap</th>
                                    <td>{{ $user->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role Aktif</th>
                                    <td>
                                        @foreach ($activeRoles as $role)
                                            <span class="badge bg-success me-1">{{ ucfirst($role) }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Administrator Profile -->
                    @if (isset($profiles['administrator']))
                        <div class="card mb-4">
                            <div class="card-header bg-gradient bg-danger text-white">
                                <h5 class="card-title mb-0"><i class="fas fa-user-shield me-2"></i>Profil Administrator</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width: 200px">Role</th>
                                        <td>{{ $profiles['administrator']['roleUser']->role->nama_role ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($profiles['administrator']['roleUser'] && $profiles['administrator']['roleUser']->status == 1)
                                                <span class="badge bg-success"><i class="fas fa-check me-1"></i>Aktif</span>
                                            @else
                                                <span class="badge bg-danger"><i
                                                        class="fas fa-times me-1"></i>Nonaktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endif

                    <!-- Dokter Profile -->
                    @if (isset($profiles['dokter']))
                        <div class="card mb-4">
                            <div class="card-header bg-gradient bg-primary text-white">
                                <h5 class="card-title mb-0"><i class="fas fa-user-md me-2"></i>Profil Dokter</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width: 200px">Role</th>
                                        <td>{{ $profiles['dokter']['roleUser']->role->nama_role ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($profiles['dokter']['roleUser'] && $profiles['dokter']['roleUser']->status == 1)
                                                <span class="badge bg-success"><i class="fas fa-check me-1"></i>Aktif</span>
                                            @else
                                                <span class="badge bg-danger"><i
                                                        class="fas fa-times me-1"></i>Nonaktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @if ($profiles['dokter']['data'])
                                        <tr>
                                            <th>Bidang Spesialisasi</th>
                                            <td>{{ $profiles['dokter']['data']->bidang_dokter ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>No. Telp</th>
                                            <td>{{ $profiles['dokter']['data']->no_hp ?? '-' }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    @endif

                    <!-- Perawat Profile -->
                    @if (isset($profiles['perawat']))
                        <div class="card mb-4">
                            <div class="card-header bg-gradient bg-success text-white">
                                <h5 class="card-title mb-0"><i class="fas fa-user-nurse me-2"></i>Profil Perawat</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width: 200px">Role</th>
                                        <td>{{ $profiles['perawat']['roleUser']->role->nama_role ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($profiles['perawat']['roleUser'] && $profiles['perawat']['roleUser']->status == 1)
                                                <span class="badge bg-success"><i class="fas fa-check me-1"></i>Aktif</span>
                                            @else
                                                <span class="badge bg-danger"><i
                                                        class="fas fa-times me-1"></i>Nonaktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @if ($profiles['perawat']['data'])
                                        <tr>
                                            <th>Pendidikan</th>
                                            <td>{{ $profiles['perawat']['data']->pendidikan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>No. Telp</th>
                                            <td>{{ $profiles['perawat']['data']->no_hp ?? '-' }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    @endif

                    <!-- Resepsionis Profile -->
                    @if (isset($profiles['resepsionis']))
                        <div class="card mb-4">
                            <div class="card-header bg-gradient bg-warning text-dark">
                                <h5 class="card-title mb-0"><i class="fas fa-user-tie me-2"></i>Profil Resepsionis</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width: 200px">Role</th>
                                        <td>{{ $profiles['resepsionis']['roleUser']->role->nama_role ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($profiles['resepsionis']['roleUser'] && $profiles['resepsionis']['roleUser']->status == 1)
                                                <span class="badge bg-success"><i class="fas fa-check me-1"></i>Aktif</span>
                                            @else
                                                <span class="badge bg-danger"><i
                                                        class="fas fa-times me-1"></i>Nonaktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endif

                    <!-- Pemilik Profile -->
                    @if (isset($profiles['pemilik']))
                        <div class="card mb-4">
                            <div class="card-header bg-gradient bg-info text-white">
                                <h5 class="card-title mb-0"><i class="fas fa-paw me-2"></i>Profil Pemilik Pet</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width: 200px">Role</th>
                                        <td>{{ $profiles['pemilik']['roleUser']->role->nama_role ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($profiles['pemilik']['roleUser'] && $profiles['pemilik']['roleUser']->status == 1)
                                                <span class="badge bg-success"><i class="fas fa-check me-1"></i>Aktif</span>
                                            @else
                                                <span class="badge bg-danger"><i
                                                        class="fas fa-times me-1"></i>Nonaktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @if ($profiles['pemilik']['data'])
                                        <tr>
                                            <th>No. WhatsApp</th>
                                            <td>{{ $profiles['pemilik']['data']->no_wa ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $profiles['pemilik']['data']->alamat ?? '-' }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

@endsection
