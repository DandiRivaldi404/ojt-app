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
                            <h4 class="card-title">Absen</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    @canany(['mhs-access'])
                                        <a style="float: right" href="{{ route('absenku.create') }}"
                                            class="btn mb-1 btn-rounded btn-outline-primary">Absensi</a>
                                    @endcanany
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Gambar</th>
                                            @canany(['admin-access', 'dpl-access'])
                                                <th>Lokasi</th>
                                                <th>Aksi</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absenku as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>
                                                    <a href="{{ asset($item->foto) }}" target="_blank">
                                                        <img src="{{ asset($item->foto) }}" alt="Foto"
                                                            width="100">
                                                    </a>
                                                </td>


                                                @canany(['admin-access', 'dpl-access'])
                                                    <td>{{ $item->lokasi->nama_instansi }}</td>

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
                                                @endcanany
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
    </div>
@endsection
