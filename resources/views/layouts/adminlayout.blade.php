<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sidebar template</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel="stylesheet" href="{{asset('css/adminSideNav.css')}}" type="text/css">

    <script src="{{ asset('js/adminlayout.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  @yield('header')
  <nav class="navbar navbar-expand-sm bg-white navbar-dark position-fixed w-100 pt-0 pb-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <div class="home-link-img-div">
          <img id="home-link-img" src="{{asset('images/logo/eazyBuyLogo.ico')}}">
        </div>
      </li>
      
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group-div">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false">
          {{session('adminname')}}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Your Profile</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
        <div class="btn-group-div">
          <button class="btn btn-light"><a href="/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></button>
        </div>
      </div>
    </ul>
  </nav>
  

  @yield('sidebar')
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a> 
            <span><i class="fas fa-bars"></i>Navigation</span>
          </a>
        </div>

        <div class="sidebar-menu">
          <ul>
            <li class="sidebar-dropdown">
              <a href="/admin">
                <i class="fa fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <li class="sidebar-dropdown">
              <a>
                <i class="fa fa-shopping-cart"></i>
                <span>Catalog</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#">Categories</a>
                  </li>
                  <li>
                    <a href="#">Products</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="sidebar-dropdown">
              <a>
                <i class="fa fa-shopping-cart"></i>
                <span>Sales</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#">Orders</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="sidebar-dropdown">
              <a>
                <i class="fa fa-chart-line"></i>
                <span>Reports</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#">Statistics</a>
                  </li>
                </ul>
              </div>
            </li>
            
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer">
        <a href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
          <i class="fa fa-envelope"></i>
          <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="#">
          <i class="fa fa-cog"></i>
          <span class="badge-sonar"></span>
        </a>
        <a href="#">
          <i class="fa fa-power-off"></i>
        </a>
      </div>
    </nav>

  
  <!-- sidebar-wrapper  -->
  <div class="position-fixed top-100 start-0 mt-5">
    <main class="page-content">
      @yield('index')
      <div class="position-fixed top-150 start-0 mt-5">
        <footer class="text-center">
          <hr>
          <div class="mb-2">
            <small>
              <a>easyBuy</a> © 2021-2021 All Rights Reserved. 
            </small>
          </div>
          <div>
            <a href="https://github.com/shoaib2018" target="_blank">
              <img alt="GitHub followers" src="https://img.shields.io/github/followers/shoaib2018?label=github&style=social" />
            </a>
          </div>
        </footer>
      </div>
    </main>
  </div>
  
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
</body>

</html>