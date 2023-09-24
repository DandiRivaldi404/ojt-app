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
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        Nama Mahasiswa
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->nama_mahasiswa }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nim
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->nim }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Semester
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->semester }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jenis Kelamin
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->jenis_kelamin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tempat Lahir
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->tempat_lahir }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Lahir
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->tanggal_lahir }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Agama
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>
                                        @if ($mhs->agama)
                                            {{ $mhs->agama->nama_agama }}
                                        @else
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alamat
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->alamat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        No Hp
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->no_hp }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ukuran Baju
                                    </td>
                                    <td>
                                        <span style="margin-right: 20px">
                                            :
                                        </span>{{ $mhs->ukuran_baju }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5>File Berkas OJT | 4 Berkas</h5>

                            <hr>
                            @if ($mhs->pas_photo)
                                <p>Pas Photo: <a href="{{ asset(mhs->pas_photo) }}" target="_blank">Lihat File</a></p>
                            @else
                                <p>Pas Photo: Belum ada file yang diunggah.</p>
                            @endif
                            @if ($mhs->ktm)
                                <p>KTM: <a href="{{ asset($mhs->ktm) }}" target="_blank">Lihat
                                        File</a></p>
                            @else
                                <p>KTM: Belum ada file yang diunggah.</p>
                            @endif
                            @if ($mhs->slip_pembayaran)
                                <p>Slip Pembayaran: <a href="{{ asset($mhs->slip_pembayaran) }}" target="_blank">Lihat
                                        File</a></p>
                            @else
                                <p>Slip Pembayaran: Belum ada file yang diunggah.</p>
                            @endif
                            @if ($mhs->transkip)
                                <p>Transkrip: <a href="{{ asset($mhs->transkip) }}" target="_blank">Lihat File</a></p>
                            @else
                                <p>Transkrip: Belum ada file yang diunggah.</p>
                            @endif
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
