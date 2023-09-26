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

        @canany(['admin-access'])
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('filter_nilai_instansi') }}" method="GET">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="select2">Pilih Lokasi</label>
                                            <select class="form-control" id="lokasi" name="lokasi"
                                                onchange="this.form.submit()">
                                                <option value="">Pilih Lokasi</option>
                                                @if (!$lokasiOptions->isEmpty())
                                                    <option value="keseluruhan">Keseluruhan</option>
                                                @endif
                                                @foreach ($lokasiOptions as $lokasiOption)
                                                    <option value="{{ $lokasiOption->id_lokasi }}">
                                                        {{ $lokasiOption->nama_instansi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcanany


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Nilai Peserta OJT</h4>
                            <p>Lokasi : </p>
                            <p>Pembimbing Instansi : </p>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <a style="float: right" href="{{ route('instansinilai.create') }}"
                                        class="btn mb-1 btn-rounded btn-outline-primary">Tambah Nilai</a>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peserta</th>
                                            <th>NK1</th>
                                            <th>NK2</th>
                                            <th>NK3</th>
                                            <th>NK4</th>
                                            <th>NK5</th>
                                            {{-- <th>JML</th> --}}
                                            <th>IP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilai as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                                <td>{{ $item->nk1 }}</td>
                                                <td>{{ $item->nk2 }}</td>
                                                <td>{{ $item->nk3 }}</td>
                                                <td>{{ $item->nk4 }}</td>
                                                <td>{{ $item->nk5 }}</td>
                                                <td>{{ $item->ip }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('mahasiswa.show', $item->nim) }}"
                                                        class="btn btn-success">Detail</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Keterangan Penilain</h5>
                            <p>Lokasi : </p>
                            <p>Pembimbing Instansi : </p>
                            <p>Pembimbing Instansi : </p>
                            <p>Pembimbing Instansi : </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
