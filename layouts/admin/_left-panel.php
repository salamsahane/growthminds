<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/admin"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
                <li class="menu-title">Management</li><!-- /.menu-title -->
                <!-- admins -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Admins</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><a href="/admin/account/all-admins"><i class="fa fa-users"></i>All Administrators</a></li>
                        <?php if(\App\Utils\Funcs::is_super_admin()): ?>
                        <li><a href="/admin/account/add-admin"><i class="fa fa-user-plus"></i>Add Administrator</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <!-- Program -->
                <li>
                    <a href="/admin/program/all-programs"> <i class="menu-icon fas fa-puzzle-piece"></i></i>Programs </a>
                </li>
                <!-- Field -->
                <li>
                    <a href="/admin/field/all-fields"> <i class="menu-icon fas fa-award"></i>Fields </a>
                </li>
                <!-- specialty -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Specialty</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fas fa-list"></i><a href="/admin/specialty/specialties">List of Specialties</a></li>
                        <li><i class="menu-icon fas fa-plus"></i><a href="/admin/specialty/add-specialty">Add Specialty</a></li>
                        <li><i class="fas fa-hand-point-right"></i><a href="forms-advanced.html">Assign Course</a></li>
                    </ul>
                </li>
                <!-- Course -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fas fa-book"></i>Course</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fas fa-list"></i><a href="/admin/course/courses">List of Courses</a></li>
                        <li><i class="menu-icon fas fa-book-medical"></i><a href="/admin/course/add-course">Add course</a></li>
                    </ul>
                </li>
                <!-- Instructor -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fas fa-chalkboard-teacher"></i>Instructor</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fas fa-users"></i><a href="/admin/instructor/instructors">List of Instructors</a></li>
                        <li><i class="menu-icon fas fa-user-plus"></i><a href="/admin/instructor/add-instructor">Add Instructor</a></li>
                    </ul>
                </li>

                <li class="menu-title">Icons</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a>
                        </li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                    </ul>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                        <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                        <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                        <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>
                <li class="menu-title">Extras</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->