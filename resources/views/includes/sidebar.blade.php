<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link d-flex flex-column align-items-center">
        <img src="{{ url('img/Logo.png') }}" alt="AdminLTE Logo" class="brand-image mt-2 mb-2">
        <div class="text-left">
            <span class="brand-text font-weight-bold d-block">Permodalan</span>
            <span class="brand-text font-weight-bold d-block">Nasional</span>
            <span class="brand-text font-weight-bold d-block">Madani</span>
        </div>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-white"></i>
                        <p class="text-white">
                            {{ Auth::user()->name }}
                        </p>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                        <p class="text-white">
                            Dashboard
                        </p>
                    </a>
                </li>

                @if (Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table text-white"></i>
                            <p class="text-white">
                                Table
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="{{ route('criteria') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-white"></i>
                                    <p class="text-white">Kriteria</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit text-white"></i>
                        <p class="text-white">
                            Form
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.karyawan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p class="text-white">Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('penilaian.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p class="text-white">Penilaian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <form action="{{ route('keluar') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-white">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white"></i>
                        Logout
                    </button>
                </form>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
