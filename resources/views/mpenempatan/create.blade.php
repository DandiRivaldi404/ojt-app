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
                                        <label class="col-lg-4 col-form-label" for="lokasi_id">Dosen <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="lokasi_id" name="lokasi_id">
                                                <option value="">Pilih Dosen</option>
                                                @foreach ($dosen as $item)
                                                    <option value="{{ $item->nidn }}">{{ $item->nama_lengkap }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="lokasi_id">Lokasi <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="lokasi_id" name="lokasi_id">
                                                <option value="">Pilih Lokasi</option>
                                                @foreach ($lokasi as $item)
                                                    <option value="{{ $item->id_lokasi }}">{{ $item->nama_instansi }}
                                                    </option>
                                                @endforeach
                                            </select>
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
