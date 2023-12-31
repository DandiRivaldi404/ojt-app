@extends('layouts.master')

@section('content')
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
                        {{-- {{ Auth::user()->mahasiswa->nim }} --}}
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('surat.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="tgl_awal">Tanggal<span
                                                class="text-danger">*</span>
                                        </label>

                                        <div class="col-md-6">
                                            <div class="input-daterange input-group" id="date-range">
                                                <input type="text" class="form-control" name="tgl_awal"> 
                                                <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                <input type="text" class="form-control" name="tgl_akhir">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="keterangan">Keterangan <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                                placeholder="">
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
        <!-- #/ container -->
    </div>
@endsection
