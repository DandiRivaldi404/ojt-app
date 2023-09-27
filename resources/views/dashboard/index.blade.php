@extends('layouts.master')

@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Jumalah Mahasiswa</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">{{ $mhs->count() }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pendaftaran Mulai</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pendaftaran Akhir</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <a style="float: right" href="" class="btn  btn-rounded btn-outline-primary">Edit
                                Data</a>
                            <h4 class="card-title">Data Ojtr</h4>
                            </h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        Angkatan
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nama Ketua Program Studi
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        NIDN Ketua Program Studi
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pendaftaran Mulai
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pendaftran Selesai
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">File Persyaratan Ojt

                                <a style="float: right" href="" class="btn  btn-rounded btn-outline-primary">Edit
                                    Data</a>
                            </h4>
                            <br>
                            <h6>1. Terdaftar sebagai mahasiswa aktif</h6>
                            <h6>2. Telah memenuhi syarat mata kuliah minimal 110 SKS </h6>
                            <h6>3. Terdaftar sebagai peserta OJt</h6>
                            <h6>4. Membayar biaya pendaftaran OJT</h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger mx-auto col-lg-8">
            {{ session('error') }}
        </div>
    @endif

    </div>
@endsection
