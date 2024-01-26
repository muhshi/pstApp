<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="/home">pstApp</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/asset/img/bps.png" width="40px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">Badan Pusat Statistik</p>
            <p class="app-sidebar__user-designation">Kabupaten Demak</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="/"><i class="app-menu__icon fa fa-male"></i><span class="app-menu__label">Pengunjung</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Laporan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="/pst/report"><i class="icon fa fa-circle-o"></i> Report</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="/pst/dashboard/<?= date('Y'); ?>/1"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Charts</span></a></li>
    </ul>
</aside>