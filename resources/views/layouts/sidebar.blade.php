<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            @guest
            @else
                <li>
                    <a class="" href="javascript:void()" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>

                @canany(['admin-access'])
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">ADMINISTRATOR</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('akun.index') }}">User</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('mdata.index')}}">Master Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('info.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Informasi</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">OJT</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('listabsen.index') }}">Absen</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('surat.index') }}">
                                    Surat Izin
                                </a>
                            </li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('jurnal.index') }}">Jurnal</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('instansinilai.index') }}">Nilai</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('monitoring.index') }}">Monitoring</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Pengaturan User</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Akses Menu</span>
                        </a>
                    </li>
                @endcanany

                @canany(['dpl-access'])
                    <li>
                        <a href="{{ route('mahasiswa.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Peserta Ojt</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('listabsen.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Laporan Absen </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('surat.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Permintaan Surat Izin</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jurnal.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Laporan Jurnal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('monitoring.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Monitoring</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('instansinilai.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Laporan Nilai</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tugasakhir.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Laporan Tugas Akhir</span>
                        </a>
                    </li>
                @endcanany

                @canany(['instansi-access'])
                    <li>
                        <a href="{{ route('mahasiswa.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Peserta Ojt</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('surat.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Permintaan Surat Izin</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('absensi.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Absen Instansi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('instansinilai.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Nilai</span>
                        </a>
                    </li>
                @endcanany

                @canany(['mhs-access'])
                    <li>
                        <a href="{{ route('resume.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Resume</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('absenku.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Absenku</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('surat.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Surat Izin</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('jurnal.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Jurnal</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('tugasakhir.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Tugas Akhir</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('penempatanlokasi.index') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Penempatan Lokasi</span>
                        </a>
                    </li>
                @endcanany

            @endguest

        </ul>
    </div>
</div>
