@extends('admin.layouts.app')

@section('title', 'Pengaturan Akun')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        @if (session('success-edit'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body fw-bold">
                                    <button class="btn-close" data-dismiss="alert" aria-label="Close">
                                        <span>&times;</span>
                                    </button>
                                    {{ session('success-edit') }}
                                </div>
                            </div>
                        @endif
                        <div class="py-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3>Profile | {{ $admin->name }}</h3>
                                <div class="">
                                    <a href="{{ route('admins.edit', $admin->id) }}"
                                        class="btn btn-primary"
                                        >
                                        <i class="fas fa-plus-square"></i>
                                        Edit Akun
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="">
                                        <p class="fw-bold">Nama</p>
                                        <p class="fw-bold">No HP </p>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="">
                                        <p class="fw-bold">: {{ $admin->name }}</p>
                                        <p class="fw-bold">: {{ $admin->phone }}</p>
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

@endsection
