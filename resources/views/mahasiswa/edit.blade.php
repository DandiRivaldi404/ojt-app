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
                                <form class="form-valide" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Nama Peserta <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $mahasiswa->nama_mahasiswa }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="semester">Semester <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="semester" name="semester"
                                                value="{{ $mahasiswa->semester }}" disabled>
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


                                    {{-- <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="email">Email <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="email" name="email"
                                            value="{{$mahasiswa->email}}">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="password">Password <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="password"
                                                name="password" value="{{$mahasiswa->password}}">
                                        </div>
                                    </div> --}}


                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button style="float: right;" type="submit" class="btn btn-primary">Submit</button>
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
    <!--**********************************
                              Content body end
                          ***********************************-->
@endsection
