<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pesantren Al Qodiri 1 Jember</title>
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png'"> -->
    <!-- Custom Stylesheet -->
    <link href="{{asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  
   

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{asset('assets/images/logo__pesantren.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('assets/images/logo__pesantren.png')}}" alt=""></span>
                    {{-- <span class="logo-compact logo-abbr" style="color:white;font-weight:bold;">Al</span> --}}
                    <span class="brand-title">
                        <img  style="width:35px;height:35px;" src="{{asset('assets/images/logo__pesantren.png')}}" alt="">
                        <span style="color:white;font-weight:bold; font-size:0.9rem;">PSB PP AQJ</span>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown d-none d-md-flex">
                           <span>{{Auth::user()->name??'user'}}</span>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{asset('assets/images/user/1.png')}}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="{{url('/logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    {{-- <li class="nav-label">Dashboard</li> --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Management Users</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/users')}}">Data Users</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./layout-blank.html">Blank</a></li>
                            <li><a href="./layout-one-column.html">One Column</a></li>
                            <li><a href="./layout-two-column.html">Two column</a></li>
                            <li><a href="./layout-compact-nav.html">Compact Nav</a></li>
                            <li><a href="./layout-vertical.html">Vertical</a></li>
                            <li><a href="./layout-horizontal.html">Horizontal</a></li>
                            <li><a href="./layout-boxed.html">Boxed</a></li>
                            <li><a href="./layout-wide.html">Wide</a></li>
                            
                            
                            <li><a href="./layout-fixed-header.html">Fixed Header</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li>
                        </ul>
                    </li>
                   
                   
               
                 
                 
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">@yield('breadcrumb1')</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">@yield('breadcrumb2')</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
    <!-- first alert -->
    <div class="flash-data" data-flashdata="<?= Session::get('message')?>">
       <!-- value data-flash dimabil lalu diolah di mysweetalert.js -->
    </div>
     @if(Session::has('failed'))
     <div style="width: 50%" class="alert alert-danger alert-dismissible mx-3" role="alert" id="myAlert">
      <span class="text-sm">Failed {{Session::get('failed')}}.</span>
     </div>
      @elseif(Session::has('success'))
     <div style="width: 50%" class="alert alert-primary alert-dismissible " role="alert" id="myAlert">
     <span class="text-sm ">Success {{Session::get('success')}}.</span>
     </div>
     @else
     @endif
    <!-- end alert -->

    @yield('content')



            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>&copy; Developed by <a href="https://refitrihidayatullah.github.io/" target="_blank">Refi Tri Hidayatullah</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    
    <script src="{{asset('assets/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/gleek.js')}}"></script>
    <script src="{{asset('assets/js/styleSwitcher.js')}}"></script>

    <script src="{{asset('assets/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src={{asset('assets/js/mysweetalert.js')}}></script>
    <script src="{{asset('assets/js/fontawesome.js')}}" crossorigin="anonymous"></script>
 
{{-- 
    <script>
        // Ambil elemen alert
        var alertElement = document.getElementById('myAlert');
    
        // Tampilkan alert
        if(alertElement)
        {
            alertElement.style.display = 'block';
            // Setelah 3 detik, sembunyikan alert
            setTimeout(function() {
                alertElement.style.display = 'none';
            }, 3000); // 3000 milidetik = 3 detik
        }else{
            
        }
    
    </script> --}}




</body>

</html>