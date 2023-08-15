<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('../assets/images/logos/1.png')}}" />
    <link rel="stylesheet" href="{{asset('../assets/css/styles.min.css')}}" />
</head>

<body>
    
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
        data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="a" style="background-color: #69dae9;"> 
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{route('main')}}" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/1.png" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <!-- ... (other menu items) ... -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('main')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('showUserManagementPage') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">User Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('showProductManagementPage') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-package"></i>
                                </span>
                                <span class="hide-menu">Product Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('showCategoryManagementPage') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-list"></i>
                                </span>
                                <span class="hide-menu">Category Management</span>
                            </a>
                        </li>
                        
                        <!-- ... (rest of the menu items) ... -->
                    </ul>
                    <!-- ... (unlimited-access and other elements) ... -->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- Sidebar End -->
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <!-- Header Start -->
            <header class="app-header" style="background-color: #69dae9;"> <!-- Changed the background color to a middle shade -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- ... (navbar content) ... -->
                </nav>
            </header>
            
    
            <!-- Header End -->
            <div class="container-fluid">
                <a href="{{ route('logout') }}"> <p align="right"> <button class="btn btn-secondary m-1"> Log Out </button>  </p> </a>
                <div class="card" style="background-color: #ffffff; border: none;"> <!-- Changed the background color and removed border -->
                    <div class="card-body">
                        <h1 class="text-center mb-4" style="color: #546e7a;"> @yield('header') </h1> <!-- Changed text color -->
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ... (script references) ... -->
</body>

</html>
