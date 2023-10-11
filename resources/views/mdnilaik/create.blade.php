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
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('mdnilaik.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div id="daftarNilaiContainer">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="angkatan_id">Daftar Angkatan<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="angkatan_id" name="angkatan_id" required>
                                                    <option value="">Pilih Angkatan</option>
                                                    @foreach ($angkatan as $itm)
                                                        <option value="{{ $itm->id_angkatan }}">{{ $itm->daftar_angkatan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row" id="daftarNilaiGroup">
                                            <label class="col-lg-4 col-form-label">Daftar Nilai<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" placeholder="Masukkan Daftar Nilai" name="daftar_nilai_kampus[]" required>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-danger removeDaftarNilai">Hapus</button>
                                            </div>
                                        </div>

                                      </div>
                                      <button type="button" class="btn btn-primary" id="addDaftarNilai">Tambah Daftar Nilai</button>

                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button style="float: right;" type="submit" class="btn btn-primary">Submit</button>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addDaftarNilaiBtn = document.getElementById("addDaftarNilai");
            const daftarNilaiContainer = document.getElementById("daftarNilaiContainer");
            const daftarNilaiGroup = document.getElementById("daftarNilaiGroup");

            addDaftarNilaiBtn.addEventListener("click", function() {
                const newDaftarNilaiGroup = daftarNilaiGroup.cloneNode(true);
                newDaftarNilaiGroup.querySelector(".removeDaftarNilai").addEventListener("click", function() {
                    if (confirm("Apakah Anda yakin ingin menghapus daftar nilai ini?")) {
                        daftarNilaiContainer.removeChild(newDaftarNilaiGroup);
                    }
                });
                daftarNilaiContainer.appendChild(newDaftarNilaiGroup);
            });
        });
    </script>
@endsection
