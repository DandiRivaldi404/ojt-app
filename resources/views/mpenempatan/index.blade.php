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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Penempatan Lokasi</h4>
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                            href="#home">Mahasiswa</a></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Dosen</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact">Koordinator
                                            Lapangan</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                                        <div class="p-t-15">
                                            <h6>Data Mahasiswa</h6>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    {{-- <a style="float: right" href="{{ route('mpenempatan.create') }}"
                                                        class="btn mb-1 btn-rounded btn-outline-primary">Penempatan</a> --}}
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nim</th>
                                                            <th>Nama Mahasiswa</th>
                                                            <th>Semester</th>
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
                                                                    @if ($item->lokasi)
                                                                        {{ $item->lokasi->nama_instansi }}
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <form
                                                                        action="{{ route('mahasiswa.destroy', $item->nim) }}"
                                                                        method="POST">
                                                                        <a href="{{ route('mahasiswa.edit', $item->nim) }}"
                                                                            class="btn btn-rounded btn-outline-primary">Edit
                                                                            Data</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-rounded btn-outline-danger">Hapus
                                                                            Data</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="profile">
                                        <div class="p-t-15">
                                            <h6>Data Dosen</h6>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <a style="float: right" href="{{ route('mpenempatan.create') }}"
                                                        class="btn mb-1 btn-rounded btn-outline-primary">Penempatan</a>
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nidn</th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Alamat</th>
                                                            <th>Lokasi</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dosen as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item->nidn }}</td>
                                                                <td>{{ $item->nama_lengkap }}</td>
                                                                <td>{{ $item->alamat }}</td>
                                                                <td>
                                                                    @if ($item->lokasi)
                                                                        {{ $item->lokasi->nama_instansi }}
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <form
                                                                        action="{{ route('mpenempatan.destroy', $item->nidn) }}"
                                                                        method="POST">
                                                                        <a href="{{ route('mpenempatan.edit', $item->nidn) }}"
                                                                            class="btn btn-rounded btn-outline-primary">Edit
                                                                            Data</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-rounded btn-outline-danger">Hapus
                                                                            Data</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="contact">
                                        <div class="p-t-15">
                                            <h4>This is contact title</h4>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                                Consonantia, there live the blind texts. Separated they live in
                                                Bookmarksgrove.
                                            </p>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                                Consonantia, there live the blind texts. Separated they live in
                                                Bookmarksgrove.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="message">
                                        <div class="p-t-15">
                                            <h4>This is message title</h4>
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                                tofu
                                                stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                                tofu
                                                stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
