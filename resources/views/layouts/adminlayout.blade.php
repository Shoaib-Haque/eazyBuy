<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sidebar template</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel="stylesheet" href="{{asset('css/admin/layoutTopNav.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/admin/layoutSideNav.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/admin/layoutFooter.css')}}" type="text/css">

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
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a> 
            <span><i class="fas fa-bars"></i>Navigation</span>
          </a>
        </div>

        <div class="sidebar-menu mb-5">
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
      <div class="sidebar-footer mt-5">
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
  </div>
    <!-- sidebar-wrapper  -->

    <div id="page-container">
      <div id="content-wrap">
       <!-- all other page content -->
        @yield('index')
      </div>
      <footer class="mt-5">
        <hr>
        <div class="footer-div mb-2">
          <small>
            <a>easyBuy</a> © 2021-2021 All Rights Reserved. 
          </small>
        </div>
        <div class="footer-div">
          <a href="https://github.com/shoaib2018" target="_blank">
            <img alt="GitHub followers" src="https://img.shields.io/github/followers/shoaib2018?label=github&style=social" />
          </a>
        </div>
      </footer>
    </div>


  <!-- page-content" -->

<!-- page-wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('js/admin/layoutSideNav.js') }}"></script>

</body>
</html>