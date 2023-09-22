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
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h3>
                                    Lengkapi Data Diri
                                    @foreach ($resume as $itm)
                                        <a style="float: right;" href="{{ route('resume.edit', $itm->nim) }}"
                                            class="btn btn-rounded btn-outline-primary">Edit Data</a>
                                    @endforeach
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    @foreach ($resume as $item)
                                        <tr>
                                            <td>
                                                Nama Mahasiswa
                                            </td>
                                            <td>
                                                <span style="margin-right: 20px">
                                                    :
                                                </span>{{ $item->nama_mahasiswa }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            Nim
                                        </td>
                                        <td>
                                            <span style="margin-right: 20px">
                                                :
                                            </span>{{ $item->nim }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Semester
                                        </td>
                                        <td>
                                            <span style="margin-right: 20px">
                                                :
                                            </span>{{ $item->semester }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenis Kelamin
                                        </td>
                                        <td>
                                            <span style="margin-right: 20px">
                                                :
                                            </span>{{ $item->jenis_kelamin }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tempat Lahir
                                        </td>
                                        <td>
                                            <span style="margin-right: 20px">
                                                :
                                            </span>{{ $item->tempat_lahir }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal Lahir
                                        </td>
                                        <td>
                                            <span style="margin-right: 20px">
                                                :
                                            </span>{{ $item->tanggal_lahir }}
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
                                            @if ($item->agama)
                                                {{ $item->agama->nama_agama }}
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
                                            </span>{{ $item->alamat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No Hp
                                        </td>
                                        <td>
                                            <span style="margin-right: 20px">
                                                :
                                            </span>{{ $item->no_hp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Ukuran Baju
                                        </td>
                                        <td>
                                            <span style="margin-right: 20px">
                                                :
                                            </span>{{ $item->ukuran_baju }}
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
                                @foreach ($resume as $itm)
                                   <hr>
                                    @if ($itm->pas_photo)
                                        <p>Pas Photo: <a href="{{ asset($itm->pas_photo) }}"
                                                target="_blank">Lihat File</a></p>
                                    @else
                                        <p>Pas Photo: Belum ada file yang diunggah.</p>
                                    @endif
                                    @if ($itm->ktm)
                                        <p>KTM: <a href="{{ asset($itm->ktm) }}" target="_blank">Lihat
                                                File</a></p>
                                    @else
                                        <p>KTM: Belum ada file yang diunggah.</p>
                                    @endif
                                    @if ($itm->slip_pembayaran)
                                        <p>Slip Pembayaran: <a href="{{ asset($itm->slip_pembayaran) }}"
                                                target="_blank">Lihat File</a></p>
                                    @else
                                        <p>Slip Pembayaran: Belum ada file yang diunggah.</p>
                                    @endif
                                    @if ($itm->transkip)
                                        <p>Transkrip: <a href="{{ asset($itm->transkip) }}"
                                                target="_blank">Lihat File</a></p>
                                    @else
                                        <p>Transkrip: Belum ada file yang diunggah.</p>
                                    @endif
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>

                <!-- #/ container -->
            </div>
        </div>
        <!--**********************************
                                                                                                    Content body end
                                                                                                ***********************************-->
    @endsection
