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

        @canany(['dpl-access', 'admin-access'])
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('filter_jurnal') }}" method="GET">
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

        @canany(['admin-access', 'dpl-access'])
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Jurnal</h4>
                                <div class="table-responsive">
                                    @if (count($jurnal) > 0)
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nim</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>Semester</th>
                                                    <th>lokasi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jurnal as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->mahasiswa->nim }}</td>
                                                        <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                                        <td>{{ $item->mahasiswa->semester }}</td>
                                                        <td>{{ $item->mahasiswa->lokasi->nama_instansi }}</td>
                                                        <td>
                                                            <a href=""
                                                                class="btn btn-rounded btn-outline-success">Detail</a>
                                                            {{-- <form action="{{ route('akun.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('akun.edit', $item->id) }}"
                                                            class="btn btn-rounded btn-outline-primary">Edit Data</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-rounded btn-outline-danger">Hapus Data</button>
                                                    </form> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p>Tidak ada data yang tersedia saat ini.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcanany


        @canany(['mhs-access'])
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Jurnal</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <a style="float: right" href="{{ route('jurnal.create') }}"
                                            class="btn mb-1 btn-rounded btn-outline-primary">Buat Jurnal</a>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Hari Tanggal</th>
                                                <th>Kegiatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jurnal as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->kegiatan }}</td>
                                                    <td>
                                                        {{-- <form action="{{ route('akun.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('akun.edit', $item->id) }}"
                                                            class="btn btn-rounded btn-outline-primary">Edit Data</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-rounded btn-outline-danger">Hapus Data</button>
                                                    </form> --}}
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
        @endcanany


    </div>
@endsection
