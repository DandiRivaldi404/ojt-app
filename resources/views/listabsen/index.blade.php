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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    {{-- <form action="{{ route('absen.show') }}" method="GET"> --}}
                        {{-- @csrf --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="select1">Pilih Absen</label>
                                <select class="form-control" id="select1" name="option1">
                                    <option value="option1_value1">Option 1 Value 1</option>
                                    <option value="option1_value2">Option 1 Value 2</option>
                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="select2">Pilih Lokasi</label>
                                <select class="form-control" id="select2" name="option2">
                                    <option value="option2_value1">Option 2 Value 1</option>
                                    <option value="option2_value2">Option 2 Value 2</option>
                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-lg-12">Lihat</button>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>


  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Daftar Absen</h4>
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered zero-configuration">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nim</th>
                                      <th>Nama Mahasiswa</th>
                                      <th>semester</th>
                                      <th>Lokasi</th>
                                      <th>Hari Tanggal</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  {{-- @foreach ($mhs as $item)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $item->nim}}</td>
                                          <td>{{ $item->nama_mahasiswa }}</td>
                                          <td>{{ $item->semester}}</td>
                                          <td>
                                              <a href="{{ route('mahasiswa.show', $item->nim) }}" class="btn btn-success">Detail</a>
                                          </td>
                                      </tr>
                                  @endforeach --}}
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection