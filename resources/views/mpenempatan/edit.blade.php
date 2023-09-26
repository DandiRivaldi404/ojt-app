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
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('mpenempatan.update', $mpenempatan->id_penempatan) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Nama Dosen <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                                value="{{ $mpenempatan->dosen->nama_lengkap }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="semester">Alamat <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                value="{{ $mpenempatan->dosen->alamat }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="lokasi_id">Lokasi <span class="text-danger">*</span></label>
                                      <div class="col-lg-6">
                                          <select class="form-control" id="lokasi_id" name="lokasi_id">
                                              <option value="">Pilih Lokasi</option>
                                              @foreach ($lokasi as $item)
                                                  <option value="{{ $item->id_lokasi }}" @if ($item->id_lokasi == $mpenempatan->lokasi_id) selected @endif>
                                                      {{ $item->nama_instansi }}
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
