<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= ucfirst($this->login->user_login()->username); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li>
                <a href="<?php echo site_url('supplier'); ?>"><i class="fa fa-truck"></i> <span>Supplier</span></a>
            </li>
            <li>
                <a href="<?php echo site_url('customer'); ?>"><i class="fa fa-users"></i> <span>Customers</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Product</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('category') ?>"><i class="fa fa-circle-o"></i> Categories</a></li>
                    <li><a href="<?php echo site_url('unit') ?>"><i class="fa fa-circle-o"></i> Units</a></li>
                    <li><a href="E"><i class="fa fa-circle-o"></i> Items</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Transaction</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Sales</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Stock In</a></li>
                    <li><a href="E"><i class="fa fa-circle-o"></i> Stock Out</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Sales</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Stock</a></li>
                </ul>
            </li>

            <?php if ($this->session->userdata('level') == 1) : ?>
                <li class="header">SETTINGS</li>
                <li><a href="<?= site_url('user'); ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>