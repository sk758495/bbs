
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <button class="sidebar-toggler" id="toggleSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <div class="d-flex align-items-center ms-auto">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> Admin User
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="dropdown-item">
            <i class="bi bi-box-arrow-right me-2"></i> {{ __('Log Out') }}
        </button>
    </form>
</li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
