<!-- resources/views/abensi/index.blade.php -->

@extends('layouts.master')

@section('title', 'Absensi')

@section('content')
    <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <a style="float: right" href="{{ route('absensi.create') }}"
                                class="btn mb-1 btn-rounded btn-outline-primary">Absensi</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@yield('title')</h4>
                            <!-- Tambahkan nama bulan di sini -->
                            <div class="month-name">
                                {{ \Carbon\Carbon::now()->format('F Y') }}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped"
                                    style="background: rgba(214, 214, 214, 0.13)">
                                    <thead style="background-color: #b9b9b960;">
                                        <tr>
                                            <th>No</th>
                                            <th style="width: 200px;">Nama Siswa</th>
                                            @foreach ($dates as $date)
                                                <th>{{ \Carbon\Carbon::parse($date)->format('d') }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absensi as $nim_id => $attendance)
                                            <tr class="{{ $loop->even ? 'even' : 'odd' }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $attendance->first()->mahasiswa->nama_mahasiswa }}</td>
                                                @foreach ($dates as $date)
                                                    <td class="attendance-cell" data-date="{{ $date }}">
                                                        @php
                                                            $absence = $attendance->where('tanggal', $date)->first();
                                                        @endphp
                                                        @if ($absence)
                                                            <span
                                                                class="absen-{{ $absence->absen }}">{{ $absence->absen }}</span>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                @endforeach
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
    
    <style>
        .odd {
            background-color: #f9f9f9;
        }

        .even {
            background-color: #ffffff;
        }

        .attendance-cell {
            cursor: pointer;
        }

        .attendance-cell:hover {
            background-color: #f2f2f2 !important;
        }

        .absen-alpa {
            color: white;
            background-color: red;
        }

        .absen-hadir {
            color: green;
        }

        .absen-izin {
            color: orange;
        }

        .text-muted {
            color: #777;
        }

        /* Gaya untuk nama bulan */
        .month-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
@endsection
