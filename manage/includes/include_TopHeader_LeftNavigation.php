<?php
$time = date("H");
$timezone = date("e");
if ($time < "12") {
	$greeting = "Good Morning";
} else
if ($time >= "12" && $time < "16") {
	$greeting = "Good Afternoon";
} else
if ($time >= "16" && $time < "19") {
	$greeting = "Good Evening";
} else
if ($time >= "19") {
	$greeting = "Good Evening";
}
?>
<div class="main_container">
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="dashboard.php" class="site_title" style="padding-left: 0px;"><b>Comapany Name</b>
                <!-- <img src="resources/images/logo-top.png" />-->
            </a> 
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_info">
                    <h2><?php echo $greeting ?>, <br /><span class="label label-primary" style="color:white;"></span>
                    </h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>Admin Modules</h3>
                    <ul class="nav side-menu">
                        <li><a href="dashboard.php"><i class="fa fa-laptop"></i> Admin Dashboard </a></li>
                        <li><a><i class="fa fa-bullhorn"></i>Manage Jobs<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="add-jobs.php">Add Job</a></li>
                                <li><a href="job-list.php">Jobs List</a></li>
                                <li><a href="#">Category</a></li>
                                <li><a href="#">Category List</a></li>
                            </ul>
                        </li>

                        <!-- <li><a><i class="fa fa-university"></i>Manage Blog<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="master-blog.php">Blog List</a></li>
                            </ul>
                        </li> -->

                        <!-- <li><a href="projects-list.php"><i class="fa fa-building"></i> Manage Orders</a></li> -->
                        <li><a href="users-list.php"><i class="fa fa-users"></i>Users</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out </a></li>
                    </ul>
                    <br />
                </div>
            </div>
            <!-- /sidebar menu -->
        </div>
    </div>
    <!-- top navigation Header -->
    <div class="top_nav">
        <div class="nav_menu">
            <nav>
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false">
                            <img src="resources/images/user.png" alt="">
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="myprofile.php"> My Profile</a></li>
                            <li>
                                <a href="change-password.php">
                                    <span>Change Password</span>
                                </a>
                            </li>
                            <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /top navigation Header -->