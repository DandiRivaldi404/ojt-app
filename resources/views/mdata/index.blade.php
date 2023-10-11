@extends('layouts.master')

@section('content')
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h4 class="card-title text-white">Lokasi</h4>
                            <div class="d-inline-block">
                                <a href="{{ route('mlokasi.index') }}">
                                    <p class="text-white mb-0">Detail</p>
                                </a>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-map-marker"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Penempatan Lokasi</h3>
                            <div class="d-inline-block">
                                <a href="{{ route('mpenempatan.index') }}">
                                    <p class="text-white mb-0">Detail</p>
                                </a>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-map-marker"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Mahasiwa</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Detail</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Angkatan</h3>
                            <div class="d-inline-block">
                                <a href="{{ route('mangkatan.index') }}">
                                    <p class="text-white mb-0">Detail</p>
                                </a>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Nilai Instansi</h3>
                            <div class="d-inline-block">
                                <a href="{{ route('mdnilaiinstansi.index') }}">
                                    <p class="text-white mb-0">Detail</p>
                                </a>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Nilai Kampus</h3>
                            <div class="d-inline-block">
                                <a href="{{ route('mdnilaik.index') }}">
                                    <p class="text-white mb-0">Detail</p>
                                </a>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #/ container -->
    </div>
@endsection
