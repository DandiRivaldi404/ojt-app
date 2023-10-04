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
                            <h4 class="card-title">Daftar Nilai Instansi</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <a style="float: right" href="{{route('mdnilaiinstansi.create')}}"
                                        class="btn mb-1 btn-rounded btn-outline-primary">Tambah Daftar Nilai</a>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Daftar Nilai Instansi</th>
                                            <th>Daftar Angkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilaiinstansi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->daftar_nilai_instansi }}</td>
                                                <td>{{ $item->angkatan_id }}</td>
                                                
                                                <td>
                                                    <form action="{{ route('mdnilaiinstansi.destroy', $item->id_daftar_nilai_instansi) }}"
                                                        method="POST">
                                                        <a href="{{ route('mdnilaiinstansi.edit', $item->id_daftar_nilai_instansi) }}"
                                                            class="btn btn-rounded btn-outline-primary">Edit Data</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-rounded btn-outline-danger">Hapus Data</button>
                                                    </form>
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
