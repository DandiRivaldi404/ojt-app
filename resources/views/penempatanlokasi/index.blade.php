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
                            <h4>Penempatan Lokasi</h4>
                            <h2 class="text-center">
                                <p>
                                    @if (auth()->user()->mahasiswa->lokasi)
                                        {{ auth()->user()->mahasiswa->lokasi->nama_instansi }}
                                    @else
                                        Data lokasi tidak tersedia.
                                    @endif
                                </p>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showConfirmation(selectElement) {
            var selectedStatus = $(selectElement).val();
            var confirmationMessage = "Anda yakin ingin mengubah status pembayaran menjadi " + selectedStatus + "?";
            var isConfirmed = confirm(confirmationMessage);

            if (isConfirmed) {
                $(selectElement).closest("form").submit();
            } else {}
        }
    </script>
@endsection
