<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto" >
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button"
                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{route('dashboard')}}" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Projects</li>
                <li>
                    <a href="{{route('project.index')}}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        All Projects
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                </li>
                <li>
                    <a href="{{route('project.create')}}">
                        <i class="metismenu-icon pe-7s-car"></i>
                        Add a Project
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                </li>
                <li>
                    <a href="{{route("project-categories.index")}}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Project Categories
                    </a>
                </li>


                <li class="app-sidebar__heading">Tasks & Tickets</li>
                <li>
                    <a href="{{route("tasks.index", ['status'=>'pending'])}}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        On Going Tasks
                    </a>
                    <a href="{{route("tasks.index", ['status'=>'complete'])}}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Completed Tasks
                    </a>

                    <a href="{{route("tickets.index")}}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Recent Tickets
                    </a>
                    <a href="dashboard-boxes.html">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Details Board
                    </a>

                </li>
                <li class="app-sidebar__heading">Teams</li>
                <li>
                    <a href="{{route('team.index')}}">
                        <i class="metismenu-icon pe-7s-mouse">
                        </i>All Teams
                    </a>
                    <a href="{{route('team.create')}}">
                        <i class="metismenu-icon pe-7s-mouse">
                        </i>Add a Team
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="metismenu-icon pe-7s-eyedropper">
                        </i>Team Stats
                    </a>
                </li>
                <li class="app-sidebar__heading">Users</li>
                <li>
                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>
                        All Users
                    </a>

                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>
                        User Roles
                    </a>
                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>
                        Permissions
                    </a>
                </li>


                <li class="app-sidebar__heading">Settings</li>
                <li>
                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>