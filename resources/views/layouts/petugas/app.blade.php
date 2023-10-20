<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Petugas - Sistem Pengecekkan Tempat Tidur</title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{URL::asset('assets/images/logorss.png')}}" type="image/png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="{{URL::asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- CSS DATATABLES -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{URL::asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/all.css')}}" rel="stylesheet">
    <link href="{{URL::asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Rubik&display=swap');



button{
    font-size: calc(12px + (16 - 12) * ((100vw - 360px) / (1600 - 300))) !important;
}


button:focus {
    box-shadow: none !important;
    outline-width: 0;
}

.card{
    border-radius :12px;
    width: calc(500px + 10 * ((100vw - 320px) / 680)) ;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.8) ;
}

.card-header{
    border-radius :12px !important;
}

.modal-body .btn-danger{
    border-radius: 11px ;
    box-shadow:  0px 5px 5px rgba(0, 0, 0, 0.2) ;
}
 .btn-light{
     background: transparent !important;
     border:0px !important;
 }

 .btn-light:hover{
    border-color:#fff !important;
 }

 .btn-light:active{
    border-color:#fff !important;
 }

@media (max-width: 526px) {
    .card{
        width: unset;
    }
}

#judul1{
            text-align:center;
        }

        
        .p2{
            text-align: center;
            font-family: Arial;
            font-size: 12pt;
        }

        .p1{
            text-align: center;
            font-family: Arial;
            font-size: 10pt;
        }

        #jurnal1{
            font-size: 8pt;
        }


    </style>

    <!-- datepicker -->

    <link rel="stylesheet" href="{{ URL::asset('datepicker/css/rome.css')}}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('datepicker/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ URL::asset('datepicker/css/style.css')}}">

</head>

<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);" id="accordionSidebar">
            
            <!-- Sidebar - Brand -->    
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img src="{{ URL::asset('assets/images/1logors.png'); }}" width="90" height="60" alt="" />
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <br>
            <!-- Nav Item - Dashboard -->
            <?php 
                $hostname = "localhost";
                $database = "pengecekkan_tempat_tidur";
                $username = "root";
                $password = "";
                $kon = mysqli_connect($hostname, $username, $password, $database);
                // script cek koneksi
                if (!$kon) {
                    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
                }

                $query = mysqli_query($kon, "SELECT * FROM tb_menu_petugas WHERE id = '1'");
                $result    =mysqli_fetch_array($query);

                $query2 = mysqli_query($kon, "SELECT * FROM tb_menu_petugas WHERE id = '2'");
                $result2    =mysqli_fetch_array($query2);

                $query3 = mysqli_query($kon, "SELECT * FROM tb_menu_petugas WHERE id = '3'");
                $result3    =mysqli_fetch_array($query3);

                $query4 = mysqli_query($kon, "SELECT * FROM tb_menu_petugas WHERE id = '4'");
                $result4    =mysqli_fetch_array($query4);

                $query5 = mysqli_query($kon, "SELECT * FROM tb_menu_petugas WHERE id = '5'");
                $result5    =mysqli_fetch_array($query5);

                $query6 = mysqli_query($kon, "SELECT * FROM tb_menu_petugas WHERE id = '6'");
                $result6    =mysqli_fetch_array($query6);

            ?>

            <li class="nav-item {{ set_active('petugas.dashboard') }}">
                <a class="nav-link <?php echo $result['status'] ?>" href="/petugas/dashboard">
                    <i class="<?php echo $result['icon'] ?>"></i>
                    <span style="color: white;">&nbsp;&nbsp;<?php echo $result['nama_menu'] ?></span></a>
            </li>

            <li class="nav-item {{ set_active('petugas.datapasien') }}">
                <a class="nav-link <?php echo $result2['status'] ?>" href="/petugas/datapasien">
                    <i class="<?php echo $result2['icon'] ?>"></i>
                    <span style="color: white;">&nbsp;&nbsp;<?php echo $result2['nama_menu'] ?></span></a>
            </li>

            <li class="nav-item {{ set_active('petugas.ruangan') }}">
                <a class="nav-link <?php echo $result3['status'] ?>" href="/petugas/ruangan">
                    <i class="<?php echo $result3['icon'] ?>"></i>
                    <span style="color: white;">&nbsp;&nbsp;<?php echo $result3['nama_menu'] ?></span></a>
            </li>

            <li class="nav-item {{ set_active('petugas.tempattidur') }}">
                <a class="nav-link <?php echo $result4['status'] ?>" href="/petugas/tempattidur">
                    <i class="<?php echo $result4['icon'] ?>"></i>
                    <span style="color: white;">&nbsp;&nbsp;<?php echo $result4['nama_menu'] ?></span></a>
            </li>

            <li class="nav-item {{ set_active('petugas.datatempattidur') }}">
                <a class="nav-link <?php echo $result5['status'] ?>" href="/petugas/datatempattidur">
                    <i class="<?php echo $result5['icon'] ?>"></i>
                    <span style="color: white;">&nbsp;&nbsp;<?php echo $result5['nama_menu'] ?></span></a>
            </li>
            
            <li class="nav-item {{ set_active(['petugas.laporanberkas', 'petugas.previewpasien', 'petugas.previewberkas']) }}">
                <a class="nav-link <?php echo $result6['status'] ?>" href="/petugas/laporanberkas">
                    <i class="<?php echo $result6['icon'] ?>"></i>
                    <span style="color: white;">&nbsp;&nbsp;<?php echo $result6['nama_menu'] ?></span></a>
            </li>
            

            <br><br><br>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="color: orange;">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h4 class="h4 mb-0 text-gray-800">Sistem Pengecekkan Tempat Tidur</h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="d-flex">
              
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <b>
                <li class="nav-item dropdown no-arrow" style="color: floralwhite;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black;"> 
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('actionlogout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> &nbsp; {{ __('Logout') }}
                        </a>

                    <form id="logout-form" action="{{ route('actionlogout') }}" class="d-none">
                        @csrf
                    </form>
                    </div>
                </li>
                </b>
              </ul>
            </div>
            </div>
                </div>

                    </ul>
                    
                </nav>
    <!-- End of Topbar -->
            

    <!-- Page content-->
    @yield('content')

    </div>
                    
    <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2022 Sisfo Pengecekkan Tempat Tidur RS Salamun</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    </div>       

    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{URL::asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{URL::asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{URL::asset('js/all.js')}}"></script>
    <script src="{{URL::asset('js/demo/chart-pie-demo.js')}}"></script>

    <script src="{{URL::asset('js/demo/datatables-demo.js')}}"></script>
    <script src="{{URL::asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- DATATABLES --> 
     <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
       <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
       <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
       <script type="text/javascript" language="javascript">
           $(document).ready(function () {
           $('#datatab').DataTable();
            });
       </script>

    <script src="{{ URL::asset('datepicker/js/popper.min.js')}}"></script>
    <script src="{{ URL::asset('datepicker/js/rome.js')}}"></script>

    <script src="{{ URL::asset('datepicker/js/main.js')}}"></script>

    @stack('scripts')
    
</body>

</html>