<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echo ($menus == "dashboard") ? "active" : "" ?>">
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                        <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                        <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                        <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                        <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                        <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                        <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                        <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                    </ul>
                </li>

                <li class="menu-title">Manajemen data</li><!-- /.menu-title -->
                <li class="<?php echo ($menus == "jadwal_maintenance") ? "active" : "" ?>">
                    <a href="<?= base_url('Maintenance') ?>"> <i class="menu-icon fa fa-calendar-o"></i>Jadwal maintenance </a>
                </li>
                <li class="<?php echo ($menus == "manajemen_asset") ? "active" : "" ?>">
                    <a href="<?= base_url('Assets_management') ?>"> <i class="menu-icon fa fa-briefcase"></i>Aset </a>
                </li>
                <li class="menu-title">Setting</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-asterisk"></i>Akun</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-user"></i><a href="page-login.html">User</a></li>
                        <li><i class="menu-icon fa fa-users"></i><a href="page-login.html">Role</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children <?php echo ($menus == "master_data") ? "active" : "" ?> dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder-open-o"></i>Master data</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-tasks"></i><a href="<?= base_url('main_category') ?>">Kategori Utama</a></li>
                        <li><i class="menu-icon fa fa-sitemap"></i><a href="<?= base_url('category') ?>">kategori</a></li>
                        <li><i class="menu-icon fa fa-tag"></i><a href="<?= base_url('brand') ?>">Merek</a></li>
                        <li><i class="menu-icon fa fa-arrows-alt"></i><a href="<?= base_url('location') ?>">Lokasi</a></li>
                        <li><i class="menu-icon fa fa-sort-numeric-desc"></i><a href="<?= base_url('condition') ?>">Kondisi</a></li>
                        <li><i class="menu-icon fa fa-flag"></i><a href="<?= base_url('status') ?>">Status</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>