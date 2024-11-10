<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pesantren Al Qodiri 1 Jember</title>
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png'"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Stylesheet -->
    <link href="{{asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/jquery-steps/css/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>

  
   

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
                @if (Auth::user()->level == "admin" || Auth::user()->level == "superadmin")
                <a href="{{url('/dashboard')}}">
                    <b class="logo-abbr"><img src="{{asset('assets/images/logo__pesantren.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('assets/images/logo__pesantren.png')}}" alt=""></span>
                    {{-- <span class="logo-compact logo-abbr" style="color:white;font-weight:bold;">Al</span> --}}
                    <span class="brand-title">
                        <img  style="width:35px;height:35px;" src="{{asset('assets/images/logo__pesantren.png')}}" alt="">
                        <span style="color:white;font-weight:bold; font-size:0.9rem;">PSB PP AQJ</span>
                    </span>
                </a>
                @endif
                @if (Auth::user()->level == "calonsantri")
                <a href="{{url('/dashboard-santri')}}">
                    <b class="logo-abbr"><img src="{{asset('assets/images/logo__pesantren.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('assets/images/logo__pesantren.png')}}" alt=""></span>
                    {{-- <span class="logo-compact logo-abbr" style="color:white;font-weight:bold;">Al</span> --}}
                    <span class="brand-title">
                        <img  style="width:35px;height:35px;" src="{{asset('assets/images/logo__pesantren.png')}}" alt="">
                        <span style="color:white;font-weight:bold; font-size:0.9rem;">PSB PP AQJ</span>
                    </span>
                </a>
                @endif
               
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
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown d-none d-md-flex">
                           <span>{{Auth::user()->name??'user'}}</span>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                @if (Auth::user()->image)
                                    @if (Auth::user()->level == "superadmin" || Auth::user()->level == "admin")
                                    <img src="{{asset('panitia_images/'.Auth::user()->image)}}" height="40" width="40" alt="">    
                                    @endif
                                    @if (Auth::user()->level == "calonsantri")
                                    <img src="{{asset('calon_santri_images/'.Auth::user()->image)}}" height="40" width="40" alt="">
                                    @endif
                                @else
                                {{-- <img src="{{asset('assets/images/user/1.png')}}" height="40" width="40" alt=""> --}}
                                <img src="{{asset('images/user.png')}}" height="40" width="40" alt="">
                                @endif
                            </div>
                            <div class="drop-down dropdown-profile dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{url('/profile')}}"><i class="icon-user"></i> <span>Profile</span></a>
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
                            <i class="fa-solid fa-house"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            @if (Auth::user()->level == "admin" || Auth::user()->level == "superadmin")
                            <li><a href="{{url('/dashboard')}}">Dashboard --admin</a></li>
                            @endif
                            @if (Auth::user()->level == "calonsantri")
                            <li><a href="{{url('/dashboard-santri')}}">Dashboard --santri</a></li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-file"></i><span class="nav-text">Form Pendaftaran</span>
                        </a>
                        <ul aria-expanded="false">
                            @php
                               $cekStatusPendaftaranSantri = DB::table('users')
                                                            ->join('status_validasis','users.id_user','=','status_validasis.user_id')
                                                            ->select('users.id_user','users.level','status_validasis.nama_status_validasi')
                                                            ->where('users.id_user',Auth::user()->id_user)
                                                            ->where('users.level','calonsantri')
                                                            ->first();
                            @endphp
                        @if ($cekStatusPendaftaranSantri && $cekStatusPendaftaranSantri->level == "calonsantri")
                            @if ($cekStatusPendaftaranSantri->nama_status_validasi == "pending")
                            <li><a href="{{url('/form-pendaftaran')}}">Form Pendaftaran</a></li>
                            @endif
                            @if ($cekStatusPendaftaranSantri->nama_status_validasi == "in_progress")
                            <li><a href="{{url('/form-info-pendaftaran')}}">Form Info Pendaftaran</a></li>
                            @endif
                        @else    
                        <li><a href="{{url('/form-pendaftaran')}}">Form Pendaftaran</a></li>
                        @endif
                             <!--**********************************
                               import data wilayah start
                            ***********************************-->
                            {{-- <li><a href="{{url('/provinsi')}}">import provinsi</a></li> --}}
                        </ul>
                    </li>
                    @if (Auth::user()->level == "admin" || Auth::user()->level == "superadmin")
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-newspaper"></i><span class="nav-text">Management Content</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/content')}}">Data Page Content</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-users-gear"></i><span class="nav-text">Management Users</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/users')}}">Data Users</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-square-pen"></i><span class="nav-text">Validasi Pendaftaran</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/validasi-pendaftaran')}}">Validasi Santri</a></li>
                        </ul>
                    </li>
                    @endif
                   
                   
               
                 
                 
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
    <script src="{{asset('assets/plugins/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/jquery-steps-init.js')}}"></script>



{{-- untuk add dan edit data wilayah form pendaftaran --}}
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        
            $(document).ready(function() {
                let selectedKabupaten = "{{ old('kabupaten_id', $dataPendaftaranById['alamat_calon_santri']['kabupaten_id'] ?? '') }}";
                let selectedKecamatan = "{{ old('kecamatan_id', $dataPendaftaranById['alamat_calon_santri']['kecamatan_id'] ?? '') }}";
                let selectedKelurahan = "{{ old('kelurahan_id', $dataPendaftaranById['alamat_calon_santri']['kelurahan_id'] ?? '') }}";
        
                $('#provinsi').change(function() {
                    var id_provinsi = $(this).val();
                    $('#kabupaten').html('<option value="">Pilih Kabupaten</option>');
                    $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
                    $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
        
                    $.ajax({
                        url: "{{ route('getkabupaten') }}",
                        method: "POST",
                        data: { id_provinsi: id_provinsi },
                        success: function(data) {              
                            var options = '<option value="">Pilih Kabupaten</option>';
                            data.forEach(function(kab) {
                                options += '<option value="' + kab.id_kabupaten + '" ' + (kab.id_kabupaten == selectedKabupaten ? 'selected' : '') + '>' + kab.name + '</option>';
                            });
                            $('#kabupaten').html(options).trigger('change');
                        }
                    });
                });
        
                $('#kabupaten').change(function() {
                    var id_kabupaten = $(this).val();
                    $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
                    $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
        
                    $.ajax({
                        url: "{{ route('getkecamatan') }}",
                        method: "POST",
                        data: { id_kabupaten: id_kabupaten },
                        success: function(data) {
                            var options = '<option value="">Pilih Kecamatan</option>';
                            data.forEach(function(kec) {
                                options += '<option value="' + kec.id_kecamatan + '" ' + (kec.id_kecamatan == selectedKecamatan ? 'selected' : '') + '>' + kec.name + '</option>';
                            });
                            $('#kecamatan').html(options).trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + error);
                            console.log(xhr.responseText); // Menampilkan pesan kesalahan dari server
                        }
                    });
                });
        
                $('#kecamatan').change(function() {
                    var id_kecamatan = $(this).val();
                    $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
        
                    $.ajax({
                        url: "{{ route('getkelurahan') }}",
                        method: "POST",
                        data: { id_kecamatan: id_kecamatan },
                        success: function(data) {
                            var options = '<option value="">Pilih Kelurahan</option>';
                            data.forEach(function(kel) {
                                options += '<option value="' + kel.id_kelurahan + '" ' + (kel.id_kelurahan == selectedKelurahan ? 'selected' : '') + '>' + kel.name + '</option>';
                            });
                            $('#kelurahan').html(options);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + error);
                            console.log(xhr.responseText); // Menampilkan pesan kesalahan dari server
                        }
                    });
                });
        
                // Trigger change event on page load if data is already selected
                if ($('#provinsi').val()) {
                    $('#provinsi').trigger('change');
                }
            });
        });
        </script>
        
 
    
    <script>
        $(document).ready(function () {
    // Check if there's a saved tab in session storage
        var activeTab = sessionStorage.getItem('activeTab');
            if (activeTab) {
            // Show the saved tab
            $('#myTab a[href="' + activeTab + '"]').tab('show');
            }

    // Save the currently active tab into session storage
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var tabName = $(e.target).attr('href');
            sessionStorage.setItem('activeTab', tabName);
            });
        });

        // $(document).ready(function () {
        //     // Check if there's a saved tab in local storage
        //     var activeTab = localStorage.getItem('activeTab');
        //     if (activeTab) {
        //         // Show the saved tab
        //         $('#myTab a[href="' + activeTab + '"]').tab('show');
        //     }
    
        //     // Save the currently active tab into local storage
        //     $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //         var tabName = $(e.target).attr('href');
        //         localStorage.setItem('activeTab', tabName);
        //     });
        // });
        
    </script>
 

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
    
    </script>



</body>

</html>