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
                            <h4 class="card-title">Data Angkatan</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <a style="float: right" href="{{ route('mangkatan.create') }}"
                                        class="btn mb-1 btn-rounded btn-outline-primary">Tambah Angkatan</a>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Daftar Angkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($angkatan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->daftar_angkatan }}</td>
                                                
                                                <td>
                                                    <form action="{{ route('mangkatan.destroy', $item->id_angkatan) }}"
                                                        method="POST">
                                                        <a href="{{ route('mangkatan.edit', $item->id_angkatan) }}"
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
