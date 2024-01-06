<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Hotel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex mb-3 mt-3 pb-3">
            <div class="image">
                <img src="{{ asset('storage/userprofile/' . session()->get('admin-account.image')) }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile_') }}" class="d-block">{{ session()->get('admin-account.name') }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking.index') }}"
                        class="nav-link {{ Request::routeIs('booking.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Booking
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bookings.list') }}"
                        class="nav-link {{ Request::routeIs('bookings.list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Booking list
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tamu.index') }}"
                        class="nav-link {{ Request::routeIs('tamu.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Buku Tamu
                        </p>
                    </a>
                </li>

                @if (session()->get('admin-account.role_id')==1)

                <li
                    class="nav-item {{ Request::routeIs('rooms.*') || Request::routeIs('categories.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::routeIs('rooms.*') || Request::routeIs('categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bed"></i>
                        <p>
                            Kamar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}"
                                class="nav-link {{ Request::routeIs('categories.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tipe kamar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rooms.index') }}"
                                class="nav-link {{ Request::routeIs('rooms.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kamar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('riwayat.list') }}"
                        class="nav-link {{ Request::routeIs('riwayat.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Riwayat booking
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ Request::routeIs('users.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
