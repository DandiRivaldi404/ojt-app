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
                                <p class="text-white mb-0">{{$mhs->count()}}</p>
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
        <!-- #/ container -->
    </div>
@endsection
