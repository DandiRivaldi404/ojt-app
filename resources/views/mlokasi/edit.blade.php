@extends('layouts.master')

@section('content')
    <!--**********************************
                                                Content body start
                                            ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('mlokasi.update', $mlokasi->id_lokasi) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama_instansi">Nama Instansi <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_instansi"
                                                name="nama_instansi" value="{{ $mlokasi->nama_instansi }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="visi_misi">Visi Misi <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="visi_misi" name="visi_misi"
                                                value="{{ $mlokasi->visi_misi }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="foto_instansi">Foto Instansi</label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" id="foto_instansi" name="foto_instansi">
                                            <input type="hidden" name="old_foto_instansi"
                                                value="{{ $mlokasi->foto_instansi }}">
                                            <small class="text-muted">
                                                <a href="{{ asset($mlokasi->foto_instansi) }}"
                                                    target="_blank">
                                                    Lihat File Sekarang
                                                </a>
                                            </small>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button style="float: right;" type="submit"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
