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
                            <h4 class="card-title">Jurnal Peserta Ojt</h4>
                            <div class="table-responsive">

                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nim</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Semester</th>
                                                <th>Kegiatan</th>
                                                <th>Lokasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jurnal as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->mahasiswa->nim }}</td>
                                                    <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                                    <td>{{ $item->mahasiswa->semester }}</td>
                                                    <td>{{ $item->kegiatan }}</td>
                                                    <td>
                                                        @if ($item->mahasiswa->lokasi)
                                                            {{ $item->mahasiswa->lokasi->nama_instansi }}
                                                        @else
                                                            Tidak ada nama instansi
                                                        @endif
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
