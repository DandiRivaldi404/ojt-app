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
                            <h4 class="card-title">Mahasiswa

                            </h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    {{-- <a style="float: right" href="{{ route('mahasiswa.create') }}"
                                        class="btn mb-1 btn-rounded btn-outline-primary">Mahasiswa</a> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>semester</th>
                                            <th>Lokasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mhs as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nim }}</td>
                                                <td>{{ $item->nama_mahasiswa }}</td>
                                                <td>{{ $item->semester }}</td>
                                                <td>
                                                    @if (isset($item->lokasi) && isset($item->lokasi->nama_instansi))
                                                        {{ $item->lokasi->nama_instansi }}
                                                    @else
                                                        Belum Memiliki Lokasi
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('mahasiswa.show', $item->nim) }}"
                                                        class="btn btn-success">Detail</a>
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
    </div>
@endsection
