<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="h-100">
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div class="login-form-bg h-100">
        <div class="container-fluid mt-5 pt-5">
            <div class="row justify-content-center h-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                           <h5> Persyaratan On the Job Training</h5>
                           <p>1. Terdaftar Sebagai Mahasiswa Aktif</p>
                           <p>2. Memenuhi Syarat Mata Kuliah Minimal 110 sks</p>
                           <p>3. Terdaftar Sebagai Mahasiwa(Peserta OJT)</p>
                           <p>4. Membayar Biaya Pelaksanaan OJT</p>
                        </div>
                    </div>
                    <div class="card mt-6">
                        <div class="card-body">
                          <h2>Informasi Jadwal</h2>
                          <p>Pendaftaran Telah Di buka</p>
                        </div>
                    </div>
                </div>
                <!-- Right Column (Login Form) -->
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h4>SIM OJT-APP</h4>
                                </a>
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="username" class="form-control" placeholder="Username" id="username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Log In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
</body>

</html>
