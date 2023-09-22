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
                                <form class="form-valide" action="{{ route('akun.update', $akun->id )}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Name <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="name" name="name" value="{{$akun->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="email">Email <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="email" name="email"
                                            value="{{$akun->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="password">Password <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="password"
                                                name="password" value="{{$akun->password}}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="level">Level <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="level" name="level">
                                                <option value="">Please select</option>
                                                <option value="panitia" {{$akun->level === 'panitia' ? 'selected' : ''}}>Panitia</option>
                                                <option value="mhs" {{$akun->level === 'mhs' ? 'selected' : ''}}>Mahasiswa</option>
                                                <option value="dpl" {{$akun->level === 'dpl' ? 'selected' : ''}}>DPL</option>
                                                <option value="kaprodi" {{$akun->level === 'kaprodi' ? 'selected' : ''}}>Kaprodi</option>
                                                <option value="instansi" {{$akun->level === 'instansi' ? 'selected' : ''}}>Instansi</option>
                                            </select>
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
    <!--**********************************
              Content body end
          ***********************************-->
@endsection
