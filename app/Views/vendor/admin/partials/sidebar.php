<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('admin/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Manajemen Proyek</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('admin/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('name') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Manajemen Proyek</li>
                    <li class="nav-item">
                        <a href="<?= url_to('adminDashboard') ?>" class="nav-link">
                            <i class="nav-icon fas fa-gavel"></i>
                            <p>Proyek</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url_to('adminBarangDashboard') ?>" class="nav-link">
                            <i class="nav-icon fas fa-cube"></i>
                            <p>Barang</p>
                        </a>
                    </li>
                    <li class="nav-header">Karyawan</li>
                    <li class="nav-item">
                        <a href="<?= url_to('adminKaryawan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Data Karyawan</p>
                        </a>
                    </li>
                    <li class="nav-header">User</li>
                    <li class="nav-item">
                        <a href="<?= url_to('adminUser') ?>" class="nav-link">
                            <i class="nav-icon fas fa-id-badge"></i>
                            <p>Data User</p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>