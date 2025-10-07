<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('dashboard') }}" class="b-brand text-primary">
                <img src="{{ asset('assets/images/logo-dark.svg') }}" class="img-fluid logo-lg" alt="logo">
            </a>
        </div>

        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-book"></i></span>
                        <span class="pc-mtext">Perkuliahan</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>

                    <ul id="menuRole" class="pc-submenu">

                    </ul>
                </li>

                <li class="pc-item">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-message-circle"></i></span>
                        <span class="pc-mtext">Forum Diskusi</span>
                    </a>
                </li>

                <li class="pc-item">
                    <button id="btnLogout" class="pc-link btn btn-link text-start w-100">
                        <span class="pc-micon"><i class="ti ti-logout"></i></span>
                        <span class="pc-mtext">Logout</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let role = localStorage.getItem('user_role');
        let menu = document.getElementById('menuRole');

        // Ambil URL halaman saat ini
        let currentUrl = window.location.pathname;

        const isActive = (route) => currentUrl.includes(route) ? 'active' : '';

        if (role === 'lecturer') {
            menu.innerHTML = `
                <li class="pc-item ${isActive('/courses')}">
                    <a class="pc-link" href="{{ route('courses.index') }}">Mata Kuliah</a>
                </li>
                <li class="pc-item ${isActive('/materials')}">
                    <a class="pc-link" href="{{ route('materials.index') }}">Materi</a>
                </li>
                <li class="pc-item ${isActive('/assignments')}">
                    <a class="pc-link" href="{{ route('assignments.index') }}">Tugas & Penilaian</a>
                </li>
                <li class="pc-item ${isActive('/reports')}">
                    <a class="pc-link" href="#">Laporan</a>
                </li>
            `;
        } else if (role === 'student') {
            menu.innerHTML = `
                <li class="pc-item ${isActive('/courses')}">
                    <a class="pc-link" href="{{ route('courses.index') }}">Mata Kuliah</a>
                </li>
                <li class="pc-item ${isActive('/materials')}">
                    <a class="pc-link" href="{{ route('materials.index') }}">Materi</a>
                </li>
                <li class="pc-item ${isActive('/assignments')}">
                    <a class="pc-link" href="{{ route('assignments.index') }}">Tugas</a>
                </li>
            `;
        }
    });

    document.getElementById('btnLogout').addEventListener('click', async () => {
        const token = localStorage.getItem('auth_token');

        let response = await fetch('/api/logout', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        });

        let data = await response.json();

        if (response.ok) {
            localStorage.removeItem('auth_token');
            window.location.href = "{{ route('index') }}";
        } else {
            alert(data.message || 'Logout gagal');
        }
    });
</script>
