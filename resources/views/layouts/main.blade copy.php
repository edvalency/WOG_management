<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WOGMS Management System</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/components.css">
    <link rel="stylesheet" href="{{ asset('./datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <script src="/js/jquery-3.6.0.js"></script>
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        @yield('search')
                        @yield('report')
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    @yield('balance')
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user mt-3"> <img alt="image" src="/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello Sarah Smith</div>
                            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i>
                                Profile
                            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                Activities
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Side bar for all the pages start -->
            <div class="main-sidebar sidebar-style-2" style="line-height: 1px;">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand mt-3" style="line-height: 1px;">
                        <a href="index.php" style='letter-spacing:0px;'> <img alt="image" src="/img/logo.png" class="header-logo mr-2" /><span class="font-12 logoname" id="">WOGMS</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown @yield('dashboard')">
                            <a href="{{ route('home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown @yield('gen')">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Members</span></a>
                            <ul class="dropdown-menu">
                                <li class="@yield('memlist')"><a class="nav-link" href="{{ route('members.show') }}">Members List</a></li>
                                <li class="@yield('addmem')"><a class="nav-link" href="{{ route('members.add') }}">Add
                                        member</a></li>

                            </ul>
                        </li>
                        <li class="dropdown @yield('offertory')">
                            <a href="{{ route('offertory.show') }}" class="menu-toggle nav-link"><i data-feather="command"></i><span>Offertory</span></a>
                        </li>
                        <li class="dropdown @yield('dactive')">
                            <a href="{{ route('expenses.show') }}" class="menu-toggle"><i data-feather="command"></i><span>Expenses</span></a>
                        </li>
                        <li class="dropdown @yield('reportpg')">
                            <a href="{{ route('reports') }}" class="menu-toggle nav-link"><i data-feather="command"></i><span>Reports</span></a>
                        </li>
                        <li class="dropdown @yield('tithe')">
                            <a href="{{ route('tithe.show') }}" class="menu-toggle nav-link"><i data-feather="mail"></i><span>Tithes</span></a>

                        </li>
                        <li class="dropdown @yield('welfare')">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Welfare</span></a>
                            <ul class="dropdown-menu">
                                <li class="@yield('welpayment')"><a class="nav-link" href="{{ route('welfare.show') }}">Payments</a></li>
                                <li class="@yield('welexpense')"><a class="nav-link" href="{{ route('welfare.expense') }}">Expenses</a></li>
                            </ul>
                        </li>

                        <li class="dropdown @yield('gcdown')">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Game Changers
                                </span></a>
                            <ul class="dropdown-menu">
                                <li class="@yield('gcmembers')"><a class="nav-link" href="{{ route('gcmembers.show') }}">Members List</a></li>

                                <li class="@yield('gcdues')"><a class="nav-link" href="{{ route('gcDues.show') }}">Dues</a></li>
                                <li class="@yield('gcoffering')"><a class="nav-link" href="{{ route('gcoffering') }}">Offerings</a></li>
                                <li class="@yield('gcexpense')"><a class="nav-link" href="{{ route('gcexpense') }}">Expenses</a></li>
                                <li class="@yield('gccontrib')"><a class="nav-link" href="{{ route('gccontrib.show') }}">Contributions</a></li>

                            </ul>
                        </li>
                        <li class="dropdown @yield('wohdown')">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Women of Honour</span></a>
                            <ul class="dropdown-menu">
                                <li class="@yield('wohmem')"><a class="nav-link" href="{{ route('woh.all') }}">Members List</a></li>
                                <li class="@yield('wohdues')"><a class="nav-link" href="{{ route('woh.dues') }}">Dues</a></li>
                                <li class="@yield('wohcontrib')"><a class="nav-link" href="#">Contributions</a>
                                </li>
                                <li class="@yield('wohexpense')"><a class="nav-link" href="{{ route('woh.expenses') }}">Expenses</a></li>
                            </ul>
                        </li>
                        <li class="dropdown @yield('offertory')">
                            <a href="{{ route('users') }}" class="menu-toggle nav-link"><i data-feather="command"></i><span>Users</span></a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- Sidebar end  -->
            <!-- Main Content -->
            <div class="main-content">

                @include('includes.alerts')
                @yield('content')

            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="#">Word of Grace Management System</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('js/app.min.js') }}"></script>
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script src="/js/dataTables.bootstrap5.min.js"></script>
    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
