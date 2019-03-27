<aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('home') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('event') }}" aria-expanded="false"><i class=" fas fa-calendar-plus"></i><span class="hide-menu">Add Event</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('events') }}" aria-expanded="false"><i class=" mdi mdi-border-outside"></i><span class="hide-menu">View Events</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('files') }}" aria-expanded="false"><i class=" mdi mdi-account-search"></i><span class="hide-menu">Add Files</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('file') }}" aria-expanded="false"><i class=" mdi mdi-account-search"></i><span class="hide-menu">View Files</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('member') }}" aria-expanded="false"><i class=" mdi mdi-account-plus "></i><span class="hide-menu">Add Member</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('members') }}" aria-expanded="false"><i class=" mdi mdi-account-search"></i><span class="hide-menu">View Members</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('winner') }}" aria-expanded="false"><i class=" mdi mdi-account-plus "></i><span class="hide-menu">Add Winner</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('winners') }}" aria-expanded="false"><i class=" mdi mdi-account-search"></i><span class="hide-menu">View Winners</span></a></li>
                        @if (Auth()->user()->is_admin == 1)
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ custom_url('admin/home') }}" aria-expanded="false"><i class=" mdi mdi-account-search"></i><span class="hide-menu">Admin Panel</span></a></li>
                        @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>