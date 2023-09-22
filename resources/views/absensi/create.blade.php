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

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form method="POST" action="{{ route('absensi.store') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Hadir</th>
                                                <th>Alpa</th>
                                                <th>Sakit</th>
                                                <th>Izin</th>
                                                {{-- <th>Tanggal</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Loop through the mahasiswa array -->
                                            @foreach ($mahasiswa as $key => $data)
                                                <tr>
                                                    <!-- Nama -->
                                                    <td>
                                                        <input type="hidden" name="absensi[{{ $key }}][nim_id]"
                                                            value="{{ $data->nim }}" placeholder="NIM"
                                                            class="form-control">
                                                        {{ $data->nama_mahasiswa }}
                                                    </td>

                                                    <!-- Radio buttons for status -->
                                                    <td>
                                                        <input type="radio" name="absensi[{{ $key }}][absen]"
                                                            value="hadir"
                                                            {{ old('absensi.' . $key . '.absen') === 'hadir' ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="absensi[{{ $key }}][absen]"
                                                            value="alpa"
                                                            {{ old('absensi.' . $key . '.absen') === 'alpa' ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="absensi[{{ $key }}][absen]"
                                                            value="sakit"
                                                            {{ old('absensi.' . $key . '.absen') === 'sakit' ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="absensi[{{ $key }}][absen]"
                                                            value="izin"
                                                            {{ old('absensi.' . $key . '.absen') === 'izin' ? 'checked' : '' }}>
                                                    </td>

                                                    {{-- <td>
                                                        <input type="hidden" name="absensi[{{ $key }}][tanggal]"
                                                            value="{{ old('absensi.' . $key . '.tanggal', now()->format('Y-m-d')) }}"
                                                            placeholder="Tanggal" class="form-control">
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                      Content body end
                                  ***********************************-->
@endsection
