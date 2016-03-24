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


    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <!-- Events -->
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> Events<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li>
                            <a href="{{route('add_event')}}"> Add Event</a>
                        </li>
                        
                        <li>
                            <a href="{{route('view_event')}}"> View Events</a>
                        </li>
                    </ul>
                </li>

                <!-- Add Society Members -->
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Add Society Members<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('team/1')}}">Core Team</a>
                        </li>
                        <li>
                            <a href="{{url('team/2')}}">Coordinators</a>
                        </li>
                        <li>
                            <a href="{{url('team/3')}}">Volunteers</a>
                        </li>
                        <li>
                            <a href="{{url('team/4')}}">Teacher Coordinators</a>
                        </li>
                    </ul>
                </li>

                @if($add_winners == 1)
                <li>
                    <a href="{{route('add_winners')}}"><i class="fa fa-table fa-fw"></i> Add Winners</a>
                </li>
                @endif
                @if($admin == 1)
                <li>
                    <a href="{{route('admin_panel')}}"><i class="fa fa-table fa-fw"></i> Admin Panel</a>
                </li>
                <li>
                    <a href="{{route('add_soc')}}"><i class="fa fa-table fa-fw"></i> Add Society</a>
                </li>
                @endif
                <li>
                    <a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
