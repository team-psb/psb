<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div  class="h-100 overflow-auto position-fixed pe-4">
        <ul class="nav pb-5">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Utama</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('biodatas.index') }}">
                    <i class="menu-icon  mdi mdi-account-card-details "></i>
                    <span class="menu-title">Biodata</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('scores.index') }}">
                    <i class="menu-icon  mdi mdi-numeric-9-plus-box-multiple-outline "></i>
                    <span class="menu-title">Nilai Tes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('videos.index') }}">
                    <i class="menu-icon  mdi mdi-video "></i>
                    <span class="menu-title">Video</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('interviews.index') }}">
                    <i class="menu-icon  mdi mdi-microphone-variant"></i>
                    <span class="menu-title">Wawancara</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('passes.index') }}">
                    <i class="menu-icon  mdi mdi-account-check"></i>
                    <span class="menu-title">Lolos</span>
                </a>
            </li>
            <li class="nav-item nav-category">Soal</li>
                <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                    <i class="menu-icon mdi mdi-puzzle"></i>
                    <span class="menu-title">Soal Tes Iq</span>
                    {{-- <i class="menu-arrow"></i> --}}
                </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('iqs.index') }}">Daftar Soal IQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('iqs.questionCreate') }}">Buat Soal IQ</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                    <i class="menu-icon  mdi mdi-school "></i>
                    <span class="menu-title">Soal Tes Kepribadian</span>
                    {{-- <i class="menu-arrow"></i> --}}
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('personals.index') }}">Daftar Soal Kepribadian</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('personals.questionCreate') }}">Buat Soal Kepribadian</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Lain-lain</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('academies.index') }}">
                    <i class="menu-icon  mdi mdi-television-guide"></i>
                    <span class="menu-title">Data Tahun Ajaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="menu-icon mdi mdi-floor-plan"></i>
                    <span class="menu-title">Informasi</span>
                    {{-- <i class="menu-arrow"></i>  --}}
                </a>
                <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('schdules.index') }}">Daftar Informasi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('schdules.make') }}">Buat Informasi</a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth">
                    <i class="menu-icon  mdi mdi-comment-question-outline"></i>
                    <span class="menu-title">Q & A</span>
                    {{-- <i class="menu-arrow"></i> --}}
                </a>
                <div class="collapse" id="auth2">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('qna.index') }}"> Daftar Q&A </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('qna.make') }}"> Buat Q&A </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Pengaturan</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings.index') }}">
                    <i class="menu-icon mdi mdi-settings"></i>
                    <span class="menu-title">Pengaturan Sistem</span>
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ url('/logout') }}" class="nav-link" >
                    @csrf
                        <a 
                        class="nav-link ps-0" 
                        href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                            <i class="menu-icon mdi mdi-logout"></i>
                            <span class="menu-title">Keluar</span>
                        </a>
                </form>
            </li>
        </ul>
    </div>
</nav>