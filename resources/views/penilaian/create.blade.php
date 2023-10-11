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
        <!-- row -->

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        {{-- {{ Auth::user()->mahasiswa->nim }} --}}
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('penilaian.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                @foreach ($daftar as $itm)
                                                    <th>{{ $itm->daftar_nilai_kampus }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mhs as $key => $data)
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="nim_id[]" value="{{ $data->nim }}">
                                                        {{ $data->nama_mahasiswa }}
                                                    </td>
                                                    @foreach ($daftar as $item)
                                                        <td>
                                                            <input type="hidden" name="daftar_nilai_kampus_id[{{ $key }}][]"
                                                                value="{{ $item->id_daftar_nilai_kampus }}">
                                                            <input type="number" class="form-control"
                                                                name="nilai_angka[{{ $key }}][{{ $item->id_daftar_nilai_kampus }}]"
                                                                placeholder="Nilai Angka">
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button style="float: right;" type="submit"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
