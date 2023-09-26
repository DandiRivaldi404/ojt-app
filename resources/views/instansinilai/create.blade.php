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
                                <form class="form-valide" action="{{ route('instansinilai.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nim_id">Nama Peserta <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="nim_id" name="nim_id">
                                                <option value="">Pilih Peserta</option>
                                                @foreach ($mhs as $item)
                                                    <option value="{{ $item->nim }}">
                                                        {{ $item->nama_mahasiswa }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nk1">NK1 <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nk1" name="nk1"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nk2">NK2 <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nk2" name="nk2"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nk3">NK3 <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nk3" name="nk3"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nk4">NK4 <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nk4" name="nk4"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nk5">NK5 <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nk5" name="nk5"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="ip">IP <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="ip" name="ip"
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
