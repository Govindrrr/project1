<div>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
                    class="logo-name">Otika</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="settings"></i><span>Teacher Activities</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('submarks.index')}}">Subject marks</a></li>
                    <li><a class="nav-link" href="widget-data.html">Results</a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{route('faculties.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Faculty</span></a>
            </li>
            <li class="">
                <a href="{{route('subjects.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Subjects</span></a>
            </li>
            <li class="">
                <a href="{{route('levels.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Classes</span></a>
            </li>
            <li class="">
                <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>category</span></a>
            </li>
            <li class="">
                <a href="{{route('users.index')}}" class="nav-link"><i data-feather="monitor"></i><span>User</span></a>
            </li>
            


           
        </ul>
    </aside>
</div>
