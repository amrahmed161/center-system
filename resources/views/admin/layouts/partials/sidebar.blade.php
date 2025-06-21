<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Teacher Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                {{-- <a href="{{ route('admin.students.index') }}" class="nav-link"> --}}
                    <i class="nav-icon fas fa-users"></i>
                    <p>Students</p>
                </a>
                </li>

                {{-- Example link: --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('centers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Centers</p>
                    </a>
                </li> --}}

            </ul>
        </nav>
    </div>
</aside>
