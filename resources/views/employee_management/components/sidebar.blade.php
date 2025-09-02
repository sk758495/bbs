    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
            <h4
                style=" font-family: 'Pacifico', cursive;
            font-size: 20px;
            color:#ff4d4d;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;">
                BBS</h4>
            <!-- <img src="laptops/logobg.png" alt="logo" class="sidebar-logo" style="width: 150px; height: 80px; "> -->
            <button class="sidebar-toggler d-md-none" id="closeSidebar">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="sidebar-content">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('project.index') ? 'active' : '' }}"
                        href="{{ route('project.index') }}">
                        <i class="bi bi-dropbox"></i> View Projects
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('settings*') ? 'active' : '' }}" href="#">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                </li>
            </ul>

        </div>

        <div class="sidebar-footer">
            <p>© 2025 Admin Panel</p>
        </div>
    </div>
