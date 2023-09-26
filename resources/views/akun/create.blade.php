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
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('akun.store') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Nama Lengkap <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Masukan Nama">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="username">Nama Pengguna <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Your valid Username..">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="password">Kata Sandi <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Choose a safe one..">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="level">Level <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="level" name="level">
                                                <option value="">Please select</option>
                                                <option value="panitia">Panitia</option>
                                                <option value="mhs">Mahasiswa</option>
                                                <option value="dpl">DPL</option>
                                                <option value="kaprodi">Kaprodi</option>
                                                <option value="instansi">Instansi</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row" id="nidn-group" style="display: none;">
                                        <label class="col-lg-4 col-form-label" for="nidn">NIDN <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nidn" name="nidn"
                                                placeholder="Masukan NIDN">
                                        </div>
                                    </div>

                                    <div class="form-group row" id="nim-group" style="display: none;">
                                        <label class="col-lg-4 col-form-label" for="nim">NIM <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nim" name="nim"
                                                placeholder="Masukan NIM">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            const levelSelect = document.getElementById('level');
            const nidnGroup = document.getElementById('nidn-group');
            const nimGroup = document.getElementById('nim-group');

            function toggleFields() {
                if (levelSelect.value === 'dpl' || levelSelect.value === 'kaprodi') {
                    nidnGroup.style.display = 'block';
                    nimGroup.style.display = 'none';
                } else if (levelSelect.value === 'mhs') {
                    nidnGroup.style.display = 'none';
                    nimGroup.style.display = 'block';
                } else {
                    nidnGroup.style.display = 'none';
                    nimGroup.style.display = 'none';
                }
            }

            toggleFields();
            levelSelect.addEventListener('change', toggleFields);
        });
    </script>
@endsection
