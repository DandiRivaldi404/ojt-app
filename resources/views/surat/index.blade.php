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

                            {{-- <form action="{{ route('absen.show') }}" method="GET"> --}}
                            {{-- @csrf --}}
                            <div class="form-row">
                                
                                <div class="form-group col-md-12">
                                    <label for="select2">Pilih Lokasi</label>
                                    <select class="form-control" id="select2" name="option2">
                                        <option value="option2_value1">Option 2 Value 1</option>
                                        <option value="option2_value2">Option 2 Value 2</option>
                                        <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-lg-12">Lihat</button>
                            {{-- </form> --}}
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
                            <h4 class="card-title">Surat Izin</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <a style="float: right" href="{{ route('surat.create') }}"
                                        class="btn mb-1 btn-rounded btn-outline-primary">Buat Surat</a>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surat as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                                <td>{{ $item->tgl_awal }} - {{ $item->tgl_akhir }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    {{-- <form action="{{ route('akun.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('akun.edit', $item->id) }}"
                                                            class="btn btn-rounded btn-outline-primary">Edit Data</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-rounded btn-outline-danger">Hapus Data</button>
                                                    </form> --}}
                                                    @canany(['admin-access'])
                                                        <form class="update-pembayaran-form"
                                                            action="{{ route('surat.editstatus', $item->id_surat) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <select class="status" name="status"
                                                                onchange="showConfirmation(this)">
                                                                <option value="{{ $item->id_surat }}">{{ $item->status }}
                                                                </option>
                                                                <option value="di proses">Di Proses</option>
                                                                <option value="di tolak">Di Tolak</option>
                                                                <option value="di setujui">Di Setujui</option>
                                                            </select>
                                                        </form>
                                                    @endcanany
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showConfirmation(selectElement) {
            var selectedStatus = $(selectElement).val();
            var confirmationMessage = "Anda yakin ingin mengubah status pembayaran menjadi " + selectedStatus + "?";
            var isConfirmed = confirm(confirmationMessage);

            if (isConfirmed) {
                $(selectElement).closest("form").submit();
            } else {}
        }
    </script>
@endsection
