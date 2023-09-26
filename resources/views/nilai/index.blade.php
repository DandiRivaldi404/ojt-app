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

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('filter_nilai') }}" method="GET">
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


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Nilai Peserta OJT</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peserta</th>
                                            <th>Lokasi</th>
                                            <th>Skil Input Data</th>
                                            <th>Kehadiran</th>
                                            <th>Np1</th>
                                            <th>Np2</th>
                                            <th>Hasil Inputan</th>
                                            <th>6 Pekerjaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilai as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                                <td>{{ $item->mahasiswa->lokasi_id }}</td>
                                                <td>{{ $item->skil_input_data }}</td>
                                                <td>{{ $item->kehadiran }}</td>
                                                <td>{{ $item->np1 }}</td>
                                                <td>{{ $item->np2 }}</td>
                                                <td>{{ $item->hasil_inputan }}</td>
                                                <td>{{ $item->pekerjaan }}</td>
                                                <td>
                                                   
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
