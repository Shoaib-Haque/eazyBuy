<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="shortcut icon" type="image/png" href="{{asset('images/logo/eazyBuyLogo.ico')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/layout/topNav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/layout/sideNav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/layout/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/layout/main.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"          ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"              ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"    ></script>  
  </head>

  <body>
  @yield('header')
    <nav class="navbar navbar-expand-sm bg-white navbar-light position-fixed w-100 pt-0 pb-0">

      <button class="btn btn-light" id="sidenav-button">
        <a href="javascript:void(0)" onclick="sideNavDisplay()" title="Open Navigation"><i class="fas fa-bars fa-lg"></i></a>
      </button>

      <ul class="navbar-nav">
        <li class="nav-item">
          <div class="home-link-img-div">
            <img id="home-link-img" src="{{asset('images/logo/eazyBuyLogo.ico')}}">
          </div>
        </li>

        <li class="nav-item">
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group-div">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" 
              aria-haspopup="true" aria-expanded="false">{{session('adminname')}}</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Your Profile</a>
                <a class="dropdown-item" href="#">Another action</a>
              </div>
            </div>
            
            <div class="btn-group-div">
              <button class="btn btn-light">
                <a href="/logout"><i class="fas fa-sign-out-alt" title="logout"></i><span class="logout-text">Logout</span></a>
              </button>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  
  @yield('sidebar')
    <div class="page-wrapper chiller-theme toggled">
      <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-brand">
            <a><i class="fas fa-bars"></i><span>Navigation</span></a>
          </div>

          <div class="sidebar-menu mb-5">
            <ul>
              <li class="sidebar-dropdown dashboard">
                <a href="/admin"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
              </li>

              <li class="sidebar-dropdown">
                <a class="sidebar-dropdown-a"><i class="fas fa-tags fw"></i><span>Catalog</span></a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="/admin/catalog/department"><i class="fa fa-angle-double-right"><span></i>Departments</span></a>
                    </li>
                    <li>
                      <a href="/admin/catalog/category"><i class="fa fa-angle-double-right"></i><span>Categories</span></a>
                    </li>
                    <li>
                      <a href="/admin/catalog/subcategory"><i class="fa fa-angle-double-right"></i><span>Subcategories</span></a>
                    </li>
                    <li>
                      <a href="/admin/catalog/product"><i class="fa fa-angle-double-right"></i><span>Products</span></a>
                    </li>
                    <li>
                      <a href="/admin/catalog/brand"><i class="fa fa-angle-double-right"></i><span>Brands</span></a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="sidebar-dropdown">
                <a><i class="fas fa-shopping-cart"></i><span>Sales</span></a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-angle-double-right"></i><span>Orders</span></a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="sidebar-dropdown">
                <a>
                  <i class="fas fa-chart-line"></i>
                  <span>Reports</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-angle-double-right"></i><span>Statistics</span></a>
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
        <div class="body">
          
        <!-- all other page content -->
        @yield('index')
        @yield('departments')
        @yield('adddepartment')
        @yield('editdepartment')

        @yield('categories')
        @yield('addcategory')
        @yield('editcategory')

        @yield('subcategories')
        @yield('addsubcategory')
        @yield('editsubcategory')

        @yield('brands')
        @yield('addbrand')
        @yield('editbrand')

        @yield('products')
        @yield('addproduct')
          
        </div>
        <div class="footer-outer-div">
          <footer class="mt-5">
            <hr>
            <div class="footer-div mb-2">
              <small>
                <a>easyBuy</a> © 2021-2021 All Rights Reserved. 
              </small>
            </div>
          </footer>
        </div>
      </div>
    </div>


  <!-- page-content" -->

<!-- page-wrapper -->
    <script type="text/javascript" src="{{ asset('js/admin/layout/sideNav.js') }}"></script>
</body>
</html>