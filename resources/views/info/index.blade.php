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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <a style="float: right" href="{{ route('info.create') }}"
                                        class="btn mb-1 btn-rounded btn-outline-primary">Tambah Data</a>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Informasi</th>
                                            <th>Terkhir diupdate</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($info as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_jadwal }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <form action="{{ route('info.destroy', $item->id_info) }}" method="POST">
                                                        <a  href="{{ route('info.edit', $item->id_info) }}" class="btn btn-rounded btn-outline-primary">Edit Data</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-rounded btn-outline-danger">Hapus Data</button>
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
        <!-- #/ container -->
    </div>
    <!--**********************************
                      Content body end
                  ***********************************-->
@endsection
