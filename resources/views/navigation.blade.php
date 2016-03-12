<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">{{ $society }}</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <!-- Events -->
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> Events<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="add_event"> Add Event</a>
                        </li>
                        <li>
                            <a href="view_event"> View Events</a>
                        </li>
                    </ul>
                </li>

                <!-- Add Society Members -->
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Add Society Members<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="core_team">Core Team</a>
                        </li>
                        <li>
                            <a href="morris.html">Coordinators</a>
                        </li>
                        <li>
                            <a href="morris.html">Volunteers</a>
                        </li>
                        <li>
                            <a href="morris.html">Teacher Coordinators</a>
                        </li>
                    </ul>
                </li>

                @if($add_winners == 1)
                <li>
                    <a href="add_winners"><i class="fa fa-table fa-fw"></i> Add Winners</a>
                </li>
                @endif
                @if($admin == 1)
                <li>
                    <a href="admin"><i class="fa fa-table fa-fw"></i> Admin Panel</a>
                </li>
                @endif


            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
