@extends('layouts.app_sneat_pns')

@section('content')


<!-- Content -->

{{-- banner --}}
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-19 mb-5 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-header">Hai PNS</h5>
                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                {{ __('You are logged in!') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img
                                src="{{ asset('sneat') }}/assets/img/illustrations/man-with-laptop-light.png"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="card-header">Kasus Balita Pendek dan Sangat Pendek
        </h4>

        {{-- card 1 --}}
        <div class="col-lg-4 col-md-4 order-1">

            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="{{ asset('sneat') }}/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Tahun 2022</span>
                            <h3 class="card-title mb-2">7.602</h3>
                            <br>
                        </div>
                    </div>
                </div>

                {{-- card 2 --}}

                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="{{ asset('sneat') }}/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Tahun 2023</span>
                            <h3 class="card-title mb-2">6.614</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-down-arrow-alt"></i> -988</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- card 3 --}}
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">

                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="{{ asset('sneat') }}/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Tahun 2022</span>
                            <h3 class="card-title mb-2">6.142 </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-down-arrow-alt"></i> -472</small>
                        </div>
                    </div>
                </div>

                {{-- card 4 --}}
                <div class="col-6 mb-4">
                    <div class="card ">

                        <div class="card-body ">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="{{ asset('sneat') }}/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Tahun 2024, Juni</span>
                            <h3 class="card-title mb-2">9.371
                            </h3>
                            <small class="text-danger fw-semibold"><i class="bx bx-up-arrow-alt"></i> +3.229</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">




        <!-- Order Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Perangkat Daerah PJ</h5>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">18</h2>
                            <span>Dinas Terkait</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="bx bx-restaurant"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Dinas Ketahanan Pangan dan Pertanian</h6>

                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">4 program</small>
                                </div>
                            </div>
                        </li>

                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-happy"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Dinas Pemberdayaan Perempuan dan Perlindungan Anak</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">3 Program</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-globe"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Dinas Komunikasi dan Informatika</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">2 Program</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-menu"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Dinas Terkait</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">1 program</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Order Statistics -->

        <!-- Expense Overview -->
        <div class="col-md-6 col-lg-4 order-1 mb-4">
            <div class="card h-100">

                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                <div class="card-title mb-0">
                                    <h5 class="m-0 me-2">Kecamatan dengan fluktuatif</h5>
                                </div>
                            </div>
                            <div id="incomeChart"></div>
                            <div class="d-flex justify pt-4 gap-2">
                                <div class="flex-shrink-0">

                                </div>
                                <div>
                                    <ul>
                                        <li>Andir</li>
                                        <li>Antapani</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expense Overview -->

        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Rekaptulasi Data</h5>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('sneat') }}/assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Jumlah Bayi Terdata</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">88,024</h6>
                                    <span class="text-muted">Bayi</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('sneat') }}/assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Balita yang
                                        Belum Diukur</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">82.78</h6>
                                    <span class="text-muted">%</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('sneat') }}/assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Balita Diukur
                                        Bulan Ini</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">17.23
                                    </h6>
                                    <span class="text-muted">%</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('sneat') }}/assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Balita Pendek dan Sangat Pendek dari Total Balita Diukur</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">0.08</h6>
                                    <span class="text-muted">%</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('sneat') }}/assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Balita Gizi Buruk
                                        dari Total Balita Diukur</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">0.02</h6>
                                    <span class="text-muted">%</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('sneat') }}/assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Balita Berat Badan Kurang
                                        dari Total Balita Diukur</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">0.05</h6>
                                    <span class="text-muted">%</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    </div>
</div>
<!-- / Content -->
@endsection
