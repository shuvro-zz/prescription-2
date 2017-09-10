<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo e(url('home/dashboard')); ?>" class="waves-effect" style="font-size: 20px;">
                    <i class="fa fa-dashboard zmdi zmdi-apps zmdi-hc-fw fa-fw" style=""></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-shopping-bag" style=""></i>
                    <span class="hide-menu">Medicine
                        <span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo e(url('medicine/show')); ?>">
                            <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-underline"
                               style=""></i>
                            <span class="hide-menu">Medicine

                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('brand/show')); ?>">
                            <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-product-hunt"
                               style=""></i>
                            <span class="hide-menu">Brand

                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo e(url('prescription/show')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-cart-plus" style=""></i>
                    <span class="hide-menu">Prescription
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('patient/show')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-users"
                       style=""></i>
                    <span class="hide-menu">Patient
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('doctor/show')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-user"
                       style=""></i>
                    <span class="hide-menu">Doctor
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('prescription/known_case')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-th"
                       style=""></i>
                    <span class="hide-menu">Known Case
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('/test')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-th"
                       style=""></i>
                    <span class="hide-menu">Test
                    </span>
                </a>
            </li>

			<li>
                <a href="<?php echo e(url('home/db_backup')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw fa fa-th-list"
                       style=""></i>
                    <span class="hide-menu">DB Backup
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>