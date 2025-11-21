@extends('layouts.lte.main')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            @foreach ($menus as $roleKey => $roleMenu)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title mb-0">
                                    <i class="{{ $roleMenu['icon'] }} me-2"></i>
                                    {{ $roleMenu['title'] }}
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($roleMenu['sections'] as $section)
                                        <div class="col-md-6 mb-4">
                                            <h5 class="mb-3">
                                                <i class="{{ $section['icon'] }} me-2"></i>
                                                {{ $section['title'] }}
                                            </h5>
                                            <div class="list-group">
                                                @foreach ($section['items'] as $item)
                                                    <a href="{{ route($item['route']) }}"
                                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                                        <i class="{{ $item['icon'] }} me-3" style="width: 20px;"></i>
                                                        <span>{{ $item['title'] }}</span>
                                                        <i class="bi bi-chevron-right ms-auto"></i>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (empty($menus))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Anda tidak memiliki role aktif. Silakan hubungi administrator.
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .list-group-item-action:hover {
            background-color: #f8f9fa;
        }

        .card-header.bg-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }
    </style>
@endpush
