@php
    $iqshow = App\Models\Setting::pluck('question_iq_value')->first();
    $personalshow = App\Models\Setting::pluck('question_personal_value')->first();
@endphp
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
            {{-- <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                </li>
                </ul>
                <div>
                <div class="btn-wrapper">
                    <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                    <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                </div>
                </div>
            </div> --}}
            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="statistics-title">Jumlah Semua Pendaftar</p>
                                    <h3 class="rate-percentage">{{ $pendaftar }}</h3>
                                </div>
                                <div>
                                    <p class="statistics-title">Jumlah Santri Baru</p>
                                    <h3 class="rate-percentage">{{ $lolos->count() }}</h3>
                                </div>
                                <div>
                                    <p class="statistics-title">Soal Tes IQ</p>
                                    <h3 class="rate-percentage">{{ $iqshow.'/'.$iq }}</h3>
                                </div>
                                <div>
                                    <p class="statistics-title">Soal Tes Kepribadian</p>
                                    <h3 class="rate-percentage">{{ $personalshow.'/'.$kepribadian }}</h3>
                                </div>
                                <div>
                                    <p class="statistics-title">Informasi</p>
                                    <h3 class="rate-percentage">{{ $informasitotal }}</h3>
                                </div>
                                <div>
                                    <p class="statistics-title">Q n A</p>
                                    <h3 class="rate-percentage">{{ $qna }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($biodataPending > 0)
                        <div class="px-3 alert alert-danger alert-dismissible fade show mt-3 d-flex justify-content-between text-dark" role="alert">
                            <p class="m-0">
                                <strong>{{$biodataPending}} Biodata</strong> belum di seleksi. <a class="fw-bold text-dark text-decoration-underline" href="{{ route('biodatas.index') }}" class="alert-link">Cek biodata</a>
                            </p>
                            <button type="button" class="btn close m-0 fs-6 text-dark" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="menu-icon  mdi mdi-close m-0"></i></span>
                            </button>
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-lg-7 d-flex flex-column">
                            <div class="row flex-grow">
                                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="d-sm-flex justify-content-between align-items-start">
                                                <div>
                                                <h4 class="card-title card-title-dash">Performa Pendaftar Baru</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">monitor the progress of registrants in a year </h5>
                                                </div>
                                                <div id="performance-line-legend"></div>
                                            </div>
                                            <div class="chartjs-wrapper mt-5">
                                                <canvas id="performaneLine"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-flex flex-column">
                            <div class="row flex-grow">
                                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                    <div class="card bg-primary card-rounded">
                                        <div class="card-body pb-0">
                                            <h4 class="card-title card-title-dash text-white mb-4">Total Pendaftar Aktif</h4>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="status-summary-ight-white mb-1">Biodata Lengkap</p>
                                                    <h2 class="text-info">{{ $totalpendaftar }}</h2>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="status-summary-chart-wrapper pb-4">
                                                        <canvas id="status-summary"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                        <div class="circle-progress-width">
                                                            <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                                        </div>
                                                        <div>
                                                            <p class="text-small mb-2">Sangat Mampu</p>
                                                            <h4 class="mb-0 fw-bold">
                                                                {{ $sangatmampu }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="circle-progress-width">
                                                            <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                                        </div>
                                                        <div>
                                                            <p class="text-small mb-2">Mampu</p>
                                                            <h4 class="mb-0 fw-bold">
                                                                {{ $mampu }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="circle-progress-width">
                                                            <div id="visitperdays" class="progressbar-js-circle pr-2"></div>
                                                        </div>
                                                        <div>
                                                            <p class="text-small mb-2">Tidak Mampu</p>
                                                            <h4 class="mb-0 fw-bold">
                                                                {{ $tidakmampu }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                            {{-- <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                        <h4 class="card-title card-title-dash">Market Overview</h4>
                                        <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                        </div>
                                        <div>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <h6 class="dropdown-header">Settings</h6>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                        <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">$36,2531.00</h2><h4 class="me-2">USD</h4><h4 class="text-success">(+1.37%)</h4></div>
                                        <div class="me-3"><div id="marketing-overview-legend"></div></div>
                                    </div>
                                    <div class="chartjs-bar-wrapper mt-3">
                                        <canvas id="marketingOverview"></canvas>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> --}}
                            {{-- <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded table-darkBGImg">
                                    <div class="card-body">
                                    <div class="col-sm-8">
                                        <h3 class="text-white upgrade-info mb-0">
                                        Enhance your <span class="fw-bold">Campaign</span> for better outreach
                                        </h3>
                                        <a href="#" class="btn btn-info upgrade-btn">Upgrade Account!</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> --}}
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                        <h4 class="card-title card-title-dash">Pendaftar Baru</h4>
                                        {{-- <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p> --}}
                                        </div>
                                        {{-- <div>
                                        <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                        </div> --}}
                                    </div>
                                    <div class="table-responsive  mt-1">
                                        <table class="table select-table">
                                            <thead>
                                                <tr>
                                                    <th>Pendaftar</th>
                                                    <th>Keluarga</th>
                                                    <th>Register On</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($newusers as $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex ">
                                                        <img src="{{ Avatar::create($item->no_wa)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" alt="">
                                                        <div>
                                                            <h6>{{ $item->full_name }}</h6>
                                                            <p>{{ $item->age }} Tahun</p>
                                                        </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6>{{ $item->family }}</h6>
                                                        <p>{{ $item->no_wa }}</p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            {{-- <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                <p class="text-success">79%</p>
                                                                <p>85/162</p>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div> --}}
                                                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if (isset($item->user->biodataTwo))
                                                            @if ($item->user->biodataTwo->status == 'lolos')
                                                            <div class="badge badge-opacity-success">lolos biodata</div>
                                                            @elseif ($item->user->biodataTwo->status == 'tidak')
                                                                <div class="badge badge-opacity-danger">tidak lolos biodata</div>
                                                            @else()
                                                                <div class="badge badge-opacity-warning">
                                                                    belum di seleksi 
                                                                    <a href="{{ route('biodatas.index') }}" class="text-decoration-none"><i class="ti-eye"></i></a>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="badge badge-opacity-danger">belum mengisi biodata</div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row flex-grow">
                                <div class="col-md-5 col-lg-5 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body card-rounded">
                                    <h4 class="card-title  card-title-dash">Informasi Terbaru</h4>
                                    @foreach ($informasi as $info)
                                    <div class="list align-items-center border-bottom py-2">
                                        <div class="wrapper w-100">
                                        <p class="mb-2 font-weight-medium">
                                            {{ $info->title }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                            <i class="mdi mdi-calendar text-muted me-1"></i>
                                            <p class="mb-0 text-small text-muted">{{ $info->created_at }}</p>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="list align-items-center pt-3">
                                        <div class="wrapper w-100">
                                        <p class="mb-0">
                                            <a href="{{ route('schdules.index') }}" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                        </p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-7 col-lg-7 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h4 class="card-title card-title-dash">Activities</h4>
                                            <p class="mb-0">{{ $activitiescount }} aktifitas hari ini</p>
                                        </div>
                                        <ul class="bullet-line-list">
                                            @forelse ($activities as $activity)
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">{{ $activity->user->name }}</span> {{ $activity->description }}</div>
                                                    <p>{{ Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</p>
                                                </div>
                                            </li>
                                            @empty
                                            <li>
                                                Tidak ada aktifitas hari ini
                                            </li>
                                            @endforelse
                                        </ul>
                                        <div class="list align-items-center pt-3">
                                            {{-- <div class="wrapper w-100">
                                                <p class="mb-0">
                                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                </p>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                        {{-- <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title card-title-dash">Todo list</h4>
                                        <div class="add-items d-flex mb-0">
                                        <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                        <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="list-wrapper">
                                        <ul class="todo-list todo-list-rounded">
                                        <li class="d-block">
                                            <div class="form-check w-100">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                                <i class="mdi mdi-flag ms-2 flag-color"></i>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="d-block">
                                            <div class="form-check w-100">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">23 June 2020</div>
                                                <div class="badge badge-opacity-success me-3">Done</div>
                                            </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check w-100">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-success me-3">Done</div>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="border-bottom-0">
                                            <div class="form-check w-100">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-danger me-3">Expired</div>
                                            </div>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div> --}}
                        <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title card-title-dash">Berdasarkan Umur (Tahun)</h4>
                                    </div>
                                    <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                    <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                        <h4 class="card-title card-title-dash">Leave Report</h4>
                                        </div>
                                        <div>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                            <h6 class="dropdown-header">week Wise</h6>
                                            <a class="dropdown-item" href="#">Year Wise</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <canvas id="leaveReport"></canvas>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div> --}}
                        <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                            <h4 class="card-title card-title-dash">Calon Santri Baru</h4>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            @foreach ($lolos->take(5) as $calon)
                                            <div class="wrapper d-flex  justify-content-between py-2 border-bottom">
                                                <div class="d-flex  align-items-center">
                                                    <img class="img-sm rounded-10" src="{{ Avatar::create($calon->user->name)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" alt="profile">
                                                    <div class="ms-3">
                                                        <h6 class="fw-bold" style="text-align: left; font-size: 14px">{{ $calon->user->biodataOne->full_name }}</h6>
                                                        <small class="text-muted mb-0">{{ $calon->user->biodataOne->age }} Tahun</small>
                                                    </div>
                                                </div>
                                                <div class="text-muted" style="text-align: right">
                                                    <p class="fw-bold">{{ $calon->user->biodataTwo->provincy->name }}</p>
                                                    <p>{{ $calon->user->biodataTwo->city->name }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="list align-items-center pt-3">
                                                <div class="wrapper w-100">
                                                    <p class="mb-0">
                                                        <a href="{{ route('passes.index') }}" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Owner <a href="https://pondokinformatika.com/" target="_blank">Pondok Informatika Al Madinah</a> from psb team.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © {{ date('Y') }}. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection

@push('after-script')
    <script>
        (function($) {
        'use strict';
        $(function() {
            if ($("#performaneLine").length) {
            var graphGradient = document.getElementById("performaneLine").getContext('2d');
            var graphGradient2 = document.getElementById("performaneLine").getContext('2d');
            var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
            saleGradientBg.addColorStop(0, 'rgba(26, 115, 232, 0.18)');
            saleGradientBg.addColorStop(1, 'rgba(26, 115, 232, 0.02)');
            var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
            saleGradientBg2.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
            saleGradientBg2.addColorStop(1, 'rgba(0, 208, 255, 0.03)');
            var salesTopData = {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: 'Pendaftar tahun ini',
                    data: <?php echo json_encode($tahunIni); ?>,
                    backgroundColor: saleGradientBg,
                    borderColor: [
                        '#1F3BB3',
                    ],
                    borderWidth: 1.5,
                    fill: true, // 3: no fill
                    pointBorderWidth: 1,
                    pointRadius: [4, 4, 4, 4, 4,4, 4, 4, 4, 4,4, 4, 4],
                    pointHoverRadius: [2, 2, 2, 2, 2,2, 2, 2, 2, 2,2, 2, 2],
                    pointBackgroundColor: ['#1F3BB3', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3'],
                    pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
                },
                {
                    label: 'Pendaftar tahun lalu',
                    data: <?php echo json_encode($tahunLalu); ?>,
                    backgroundColor: saleGradientBg2,
                    borderColor: [
                        '#52CDFF',
                    ],
                    borderWidth: 1.5,
                    fill: true, // 3: no fill
                    pointBorderWidth: 1,
                    pointRadius: [4, 4, 4, 4, 4,4, 4, 4, 4, 4,4, 4, 4],
                    pointHoverRadius: [2, 2, 2, 2, 2,2, 2, 2, 2, 2,2, 2, 2],
                    pointBackgroundColor: ['#52CDFF', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF'],
                    pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
                }
                ]
            };
        
            var salesTopOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            drawBorder: false,
                            color:"#F0F0F0",
                            zeroLineColor: '#F0F0F0',
                        },
                        ticks: {
                            beginAtZero: false,
                            autoSkip: true,
                            maxTicksLimit: 4,
                            fontSize: 10,
                            color:"#6B778C"
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                        beginAtZero: false,
                        autoSkip: true,
                        maxTicksLimit: 7,
                        fontSize: 10,
                        color:"#6B778C"
                        }
                    }],
                },
                legend:false,
                legendCallback: function (chart) {
                    var text = [];
                    text.push('<div class="chartjs-legend"><ul>');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                    console.log(chart.data.datasets[i]); // see what's inside the obj.
                    text.push('<li>');
                    text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                    text.push(chart.data.datasets[i].label);
                    text.push('</li>');
                    }
                    text.push('</ul></div>');
                    return text.join("");
                },
                
                elements: {
                    line: {
                        tension: 0.4,
                    }
                },
                tooltips: {
                    backgroundColor: 'rgba(31, 59, 179, 1)',
                }
            }
            var salesTop = new Chart(graphGradient, {
                type: 'line',
                data: salesTopData,
                options: salesTopOptions
            });
            document.getElementById('performance-line-legend').innerHTML = salesTop.generateLegend();
            }
            
            if ($("#status-summary").length) {
            var statusSummaryChartCanvas = document.getElementById("status-summary").getContext('2d');;
            var statusData = {
                labels: ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"],
                datasets: [{
                    label: '# of Votes',
                    data: [50, 68, 70, 10, 12, 80],
                    backgroundColor: "#ffcc00",
                    borderColor: [
                        '#01B6A0',
                    ],
                    borderWidth: 2,
                    fill: false, // 3: no fill
                    pointBorderWidth: 0,
                    pointRadius: [0, 0, 0, 0, 0, 0],
                    pointHoverRadius: [0, 0, 0, 0, 0, 0],
                }]
            };
        
            var statusOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        display:false,
                        gridLines: {
                            display: false,
                            drawBorder: false,
                            color:"#F0F0F0"
                        },
                        ticks: {
                            beginAtZero: false,
                            autoSkip: true,
                            maxTicksLimit: 4,
                            fontSize: 10,
                            color:"#6B778C"
                        }
                    }],
                    xAxes: [{
                        display:false,
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                        beginAtZero: false,
                        autoSkip: true,
                        maxTicksLimit: 7,
                        fontSize: 10,
                        color:"#6B778C"
                        }
                    }],
                },
                legend:false,
                
                elements: {
                    line: {
                        tension: 0.4,
                    }
                },
                tooltips: {
                    backgroundColor: 'rgba(31, 59, 179, 1)',
                }
            }
            var statusSummaryChart = new Chart(statusSummaryChartCanvas, {
                type: 'line',
                data: statusData,
                options: statusOptions
            });
            }
            if ($('#totalVisitors').length) {
            var bar = new ProgressBar.Circle(totalVisitors, {
                color: '#fff',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 15,
                trailWidth: 15, 
                easing: 'easeInOut',
                duration: 1400,
                text: {
                autoStyleContainer: false
                },
                from: {
                color: '#52CDFF',
                width: 15
                },
                to: {
                color: '#677ae4',
                width: 15
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);
        
                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('');
                } else {
                    circle.setText(value);
                }
        
                }
            });
        
            bar.text.style.fontSize = '0rem';
            bar.animate(.64); // Number from 0.0 to 1.0
            }
            if ($('#visitperday').length) {
            var bar = new ProgressBar.Circle(visitperday, {
                color: '#fff',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 15,
                trailWidth: 15,
                easing: 'easeInOut',
                duration: 1400,
                text: {
                autoStyleContainer: false
                },
                from: {
                color: '#34B1AA',
                width: 15
                },
                to: {
                color: '#677ae4',
                width: 15
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);
        
                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('');
                } else {
                    circle.setText(value);
                }
        
                }
            });
        
            bar.text.style.fontSize = '0rem';
            bar.animate(.34); // Number from 0.0 to 1.0
            }
            if ($('#visitperdays').length) {
            var bar = new ProgressBar.Circle(visitperdays, {
                color: '#fff',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 15,
                trailWidth: 15,
                easing: 'easeInOut',
                duration: 1400,
                text: {
                autoStyleContainer: false
                },
                from: {
                color: '#34B11A',
                width: 15
                },
                to: {
                color: '#677aa4',
                width: 15
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);
        
                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('');
                } else {
                    circle.setText(value);
                }
        
                }
            });
        
            bar.text.style.fontSize = '0rem';
            bar.animate(.79); // Number from 0.0 to 1.0
            }
            if ($("#marketingOverview").length) {
            var marketingOverviewChart = document.getElementById("marketingOverview").getContext('2d');
            var marketingOverviewData = {
                labels: ["JAN","FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [{
                    label: 'Last week',
                    data: [110, 220, 200, 190, 220, 110, 210, 110, 205, 202, 201, 150],
                    backgroundColor: "#52CDFF",
                    borderColor: [
                        '#52CDFF',
                    ],
                    borderWidth: 0,
                    fill: true, // 3: no fill
                    
                },{
                    label: 'This week',
                    data: [215, 290, 210, 250, 290, 230, 290, 210, 280, 220, 190, 300],
                    backgroundColor: "#1F3BB3",
                    borderColor: [
                        '#1F3BB3',
                    ],
                    borderWidth: 0,
                    fill: true, // 3: no fill
                }]
            };
        
            var marketingOverviewOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            drawBorder: false,
                            color:"#F0F0F0",
                            zeroLineColor: '#F0F0F0',
                        },
                        ticks: {
                            beginAtZero: true,
                            autoSkip: true,
                            maxTicksLimit: 5,
                            fontSize: 10,
                            color:"#6B778C"
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        barPercentage: 0.35,
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                        beginAtZero: false,
                        autoSkip: true,
                        maxTicksLimit: 12,
                        fontSize: 10,
                        color:"#6B778C"
                        }
                    }],
                },
                legend:false,
                legendCallback: function (chart) {
                    var text = [];
                    text.push('<div class="chartjs-legend"><ul>');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                    console.log(chart.data.datasets[i]); // see what's inside the obj.
                    text.push('<li class="text-muted text-small">');
                    text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                    text.push(chart.data.datasets[i].label);
                    text.push('</li>');
                    }
                    text.push('</ul></div>');
                    return text.join("");
                },
                
                elements: {
                    line: {
                        tension: 0.4,
                    }
                },
                tooltips: {
                    backgroundColor: 'rgba(31, 59, 179, 1)',
                }
            }
            var marketingOverview = new Chart(marketingOverviewChart, {
                type: 'bar',
                data: marketingOverviewData,
                options: marketingOverviewOptions
            });
            document.getElementById('marketing-overview-legend').innerHTML = marketingOverview.generateLegend();
            }
            if ($("#doughnutChart").length) {
            var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
            var doughnutPieData = {
                datasets: [{
                data: [{{ $age['16'] }}, {{ $age['17'] }}, {{ $age['18'] }}, {{ $age['19'] }}, {{ $age['20'] }}, {{ $age['21'] }}],
                backgroundColor: [
                    "#1F3BB3",
                    "#FDD0C7",
                    "#52CDFF",
                    "#7442eb",
                    "#81DADA",
                    "#c442eb"
                ],
                borderColor: [
                    "#1F3BB3",
                    "#FDD0C7",
                    "#52CDFF",
                    "#7442eb",
                    "#81DADA",
                    "#c442eb"
                ],
                }],
        
                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                '16',
                '17',
                '18',
                '19',
                '20',
                '21',
                ]
            };
            var doughnutPieOptions = {
                cutoutPercentage: 50,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
                responsive: true,
                maintainAspectRatio: true,
                showScale: true,
                legend: false,
                legendCallback: function (chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul class="justify-content-center">');
                for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                    text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                    text.push('</span>');
                    if (chart.data.labels[i]) {
                    text.push(chart.data.labels[i]);
                    }
                    text.push('</li>');
                }
                text.push('</div></ul>');
                return text.join("");
                },
                
                layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
                },
                tooltips: {
                callbacks: {
                    title: function(tooltipItem, data) {
                    return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function(tooltipItem, data) {
                    return data['datasets'][0]['data'][tooltipItem['index']];
                    }
                },
                    
                backgroundColor: '#fff',
                titleFontSize: 14,
                titleFontColor: '#0B0F32',
                bodyFontColor: '#737F8B',
                bodyFontSize: 11,
                displayColors: false
                }
            };
            var doughnutChart = new Chart(doughnutChartCanvas, {
                type: 'doughnut',
                data: doughnutPieData,
                options: doughnutPieOptions
            });
            document.getElementById('doughnut-chart-legend').innerHTML = doughnutChart.generateLegend();
            }
        });
        })(jQuery);
    </script>
@endpush



