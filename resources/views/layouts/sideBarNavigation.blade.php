<ul class="metismenu" id="menu">
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-sort-z-a"></i>
            </div>
            <div class="menu-title">Data Center</div>
        </a>
        <ul>
            <li> <a href="{{ route('ss.index') }}"><i class="bx bx-right-arrow-alt"></i>Sasaran</a></li>
            <li> <a href="{{ route('ik.index') }}"><i class="bx bx-right-arrow-alt"></i>Iku</a></li>
            <li> <a href="{{ route('program.index') }}"><i class="bx bx-right-arrow-alt"></i>Program</a></li>
            <li> <a href="{{ route('kkmentri.index') }}"><i class="bx bx-right-arrow-alt"></i>KK Menteri</a></li>
            <li> <a href="{{ route('rincianprogram.index') }}"><i class="bx bx-right-arrow-alt"></i>Rancangan Anggaran</a></li>
            <li> <a href="{{ route('unitkerja.index') }}"><i class="bx bx-right-arrow-alt"></i>Participants</a></li>
            {{-- <li> <a href="{{ route('kegiatan.index') }}"><i class="bx bx-right-arrow-alt"></i>Kegiatan</a></li>
            <li> <a href="{{ route('RincianKomponen.index') }}"><i class="bx bx-right-arrow-alt"></i>Rincian Komponen</a></li> --}}
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-pen"></i>
            </div>
            <div class="menu-title">Create Data</div>
        </a>
        <ul>

        <a href="{{ route('kk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Perjanjian Kinerja</div>
        </a>
        <a href="{{ route('rpk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Rencana Program Kegiatan</div>
        </a>
        <a href="{{ route('rab.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Rincian Anggaran Biaya</div>
        </a>
        <a href="{{ route('rangka.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Rancangan Anggaran</div>
        </a>
        </ul>
    </li>

    {{-- verifikasi --}}
       <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-bug-alt"></i>
            </div>
            <div class="menu-title">Data Verification</div>
        </a>
        <ul>

        <a href="{{ route('verification.perkin') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Verifikasi Perkin</div>
        </a>
        <a href="{{ route('verification.rekat')}}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Verifikasi Rekat</div>
        </a>

        </ul>
    </li>

    {{-- verifikasi --}}

    {{-- laporan --}}
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-printer"></i>
            </div>
            <div class="menu-title">Report</div>
        </a>
        <ul>
        <a href="{{ route('kk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">LALITA</div>
        </a>
        <a href="{{ route('kk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">PERKIN</div>
        </a>
        <a href="{{ route('kk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">REPRO</div>
        </a>
        <a href="{{ route('kk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">REKAT</div>
        </a>
        <a href="{{ route('kk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">RAB</div>
        </a>
        <a href="{{ route('kk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">RANGKA</div>
        </a>
        </ul>
    </li>

        {{-- <a href="{{ route('ikk.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Data IKK</div>
        </a>
        <a href="{{ route('kegiatanRinci.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Data Kegiatan</div>
        </a>
        <a href="{{ route('komponen.index') }}">
            <div class="parent-icon"><i class='bx bx-grid'></i>
            </div>
            <div class="menu-title">Data Komponen</div>
        </a> --}}
    </li>
</ul>
