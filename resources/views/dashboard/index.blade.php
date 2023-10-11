@extends('layouts.master')

@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Jumlah Mahasiswa</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">{{ $mhs->count() }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                @foreach ($dataojt as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pendaftaran Mulai</h3>
                                <div class="d-inline-block">
                                    <p class="text-white mb-0">{{ $item->pendaftaran_mulai }}</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pendaftaran Akhir</h3>
                                <div class="d-inline-block">
                                    <p class="text-white mb-0">{{ $item->pendaftaran_selesai }}</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($dataojt as $itm)
                                {{-- <form action="{{ route('dataojt.destroy', $itm->id_dataojt) }}" method="POST" style="float: right;">
                                @canany(['admin-access'])
                                <a href="{{ route('dataojt.edit', $itm->id_dataojt) }}" class="btn btn-rounded btn-outline-primary">Pengaturan</a>
                                @endcanany
                                @csrf
                                @method('DELETE')
                            </form> --}}

                                @canany(['admin-access'])
                                    <a href="{{ route('dataojt.index') }}"
                                        class="btn btn-rounded btn-outline-primary" style="float: right;">Pengaturan</a>
                                @endcanany

                                <h4 class="card-title">Data OJT</h4>
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Angkatan</td>
                                        <td>
                                            <span style="margin-right: 20px">: {{ $itm->angkatan->daftar_angkatan }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ketua Program Studi</td>
                                        <td>
                                            <span style="margin-right: 20px">: {{ $itm->nama_kaprodi }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NIDN Ketua Program Studi</td>
                                        <td>
                                            <span style="margin-right: 20px">: {{ $itm->nidn_kaprodi }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pendaftaran Mulai</td>
                                        <td>
                                            <span style="margin-right: 20px">: {{ $itm->pendaftaran_mulai }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pendaftaran Selesai</td>
                                        <td>
                                            <span style="margin-right: 20px">: {{ $itm->pendaftaran_selesai }}</span>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($filebrks as $itm)
                                <form action="{{ route('filebrks.destroy', $itm->id_filebrks) }}" method="POST"
                                    style="float: right;">
                                    @canany(['admin-access'])
                                        <a href="{{ route('filebrks.edit', $itm->id_filebrks) }}"
                                            class="btn btn-rounded btn-outline-primary">Pengaturan</a>
                                    @endcanany
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <h4 class="card-title">File Persyaratan OJT</h4>
                                <br>
                                <h6>{{ $itm->terdaftar }}</h6>
                                <h6>{{ $itm->memenuhi_syarat }}</h6>
                                <h6>{{ $itm->terdaftar_peserta }}</h6>
                                <h6>{{ $itm->pembayaran }}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="alert alert-danger mx-auto col-lg-8">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endsection
