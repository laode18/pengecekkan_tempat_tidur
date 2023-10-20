<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Sistem Informasi Tempat Tidur</title>
    <link rel="shortcut icon" href="{{URL::asset('assets/images/logorss.png')}}" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{URL::asset('kalender/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('kalender/css/bootstrap-datetimepicker.min.css')}}">

<!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/templatemo-art-factory.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/css/all.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
     <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style type="text/css">
        .slider .slick-slide img {
            width: 100%;
        }

        /* make button larger and change their positions */
        .slick-prev, .slick-next {
            width: 50px;
            height: 50px;
            z-index: 1;
        }
        .slick-prev {
            left: 5px;
        }
        .slick-next {
            right: 5px;
        }
        .slick-prev:before, 
        .slick-next:before {
            font-size: 40px;
            text-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        
        /* move dotted nav position */
        .slick-dots {
            bottom: 15px;
        }
        /* enlarge dots and change their colors */
        .slick-dots li button:before {
            font-size: 12px;
            color: #fff;
            text-shadow: 0 0 10px rgba(0,0,0,0.5);
            opacity: 1;
        }
        .slick-dots li.slick-active button:before {
            color: #dedede;
        }

        /* hide dots and arrow buttons when slider is not hovered */
        .slider:not(:hover) .slick-arrow,
        .slider:not(:hover) .slick-dots {
            opacity: 0;
        }
        /* transition effects for opacity */
        .slick-arrow,
        .slick-dots {
            transition: opacity 0.5s ease-out;
        }
    </style>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="{{ URL::asset('assets/images/logorss.png'); }}" width="70" height="60" alt="" />
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/login">Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1><strong>Sistem Informasi Tempat Tidur</strong></h1>
                        <h3 style="font-size: 30pt">&nbsp;Rumah Sakit Salamun</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <div class="slider">

                        @foreach ($navpic as $np)
                        <div>
                            <a href="#">
                                <img src="{{ url('images/'.$np->gambar) }}" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic" alt="Image {{ $np->id }}">
                            </a>            
                        </div>
                        @endforeach

                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->



    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5>Informasi Peminjaman Tempat Tidur</h5>
                    </div>
                    <p>Pengunjung web dapat melihat informasi terkait dengan peminjaman temapt tidur.</p>
                    <ul>
                        <li>
                            <img src="assets/images/about-icon-01.png" alt="">
                            <div class="text">
                                <h6>Data Tempat Tidur Tersedia</h6>
                                <p>Kamu dapat mengecek jumlah maupun data tempat tidur yang masih tersedia dengan cara <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Klik Disini</button></p>
                            </div>
                        </li>
                        <!-- Modal -->
                          <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- konten modal-->
                              <div class="modal-content">
                                <!-- heading modal -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Data Tempat Tidur</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
                                </div>
                                <!-- body modal -->
                                <div class="modal-body">
                                  <table class="table table-bordered" id="dataTable" style="background-color: white; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center; width: 10%;">No.</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">No Tempat Tidur</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">Kelas</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">gambar</th>
                                            <th style="vertical-align: middle; text-align: center; width: 30%;">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    
                                    <tbody>
                                    <?php $no=1; ?>
                                    @foreach ($tempattidur as $np)
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;">{{$no++}}.</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $np->no_tempat_tidur }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $np->kelas }}</td>
                                            <?php 
                                                if ($np->status == "hidden") {
                                                    $pt = "Sedang Terpakai";
                                                } else {
                                                    $pt = "Tidak Terpakai";
                                                }
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;">{{ $pt }}</td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <img src="{{ url('images/'.$np->gambar) }}" class="img-thumbnail" width="100" height="100">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>

                            </div>
                          </div>

                        <li>
                            <img src="assets/images/about-icon-03.png" alt="">
                            <div class="text">
                                <h6>Data Ruangan</h6>
                                <p>Kamu juga dapat melihat ruangan dan kapasitas total tempat tidur nya, dengan cara <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Klik Disini</button></p>
                            </div>
                        </li>
                        <!-- Modal -->
                          <div id="myModal2" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- konten modal-->
                              <div class="modal-content">
                                <!-- heading modal -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Data Ruangan</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
                                </div>
                                <!-- body modal -->
                                <div class="modal-body">
                                  
                                    <table class="table table-bordered" id="dataTable" style="background-color: white; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center; width: 10%;">No.</th>
                                            <th style="vertical-align: middle; text-align: center; width: 30%;">Nama Ruangan</th>
                                            <th style="vertical-align: middle; text-align: center; width: 30%;">Tempat Tidur Terpakai</th>
                                            <th style="vertical-align: middle; text-align: center; width: 30%;">Total Kapasitas</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    
                                    <tbody>
                                    <?php $no=1; ?>
                                    @foreach ($ruangan as $ns)
                                        <?php
                                            $jumlah_terpakai = DB::table('tb_datatempattidur')
                                                ->where('id_ruangan', $ns->id_ruangan)->whereNull('tanggal_keluar')->count('id_ruangan');
                                            $total_tidur = DB::table('tb_ruangan')->sum('jumlah');
                                        ?>
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;">{{$no++}}.</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $ns->nama_ruangan }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $jumlah_terpakai }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $ns->jumlah }}</td>
                                            
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Tempat Tidur</b></td>
                                            <td style="vertical-align: middle; text-align: center;"><b>{{ $tor }}</b></td>
                                            <td style="vertical-align: middle; text-align: center;"><b>{{ $total_tidur }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>

                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>

                            </div>
                          </div>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="assets/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

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

                $query = mysqli_query($kon, "SELECT * FROM tb_landingpage_predata WHERE id = '1'");
                $result    =mysqli_fetch_array($query);

                $query2 = mysqli_query($kon, "SELECT * FROM tb_landingpage_predata WHERE id = '2'");
                $result2    =mysqli_fetch_array($query2);

                $query3 = mysqli_query($kon, "SELECT * FROM tb_landingpage_predata WHERE id = '3'");
                $result3    =mysqli_fetch_array($query3);

                $query4 = mysqli_query($kon, "SELECT * FROM tb_landingpage_predata WHERE id = '4'");
                $result4    =mysqli_fetch_array($query4);

                $query5 = mysqli_query($kon, "SELECT * FROM tb_landingpage_predata WHERE id = '5'");
                $result5    =mysqli_fetch_array($query5);

                $query6 = mysqli_query($kon, "SELECT * FROM tb_landingpage_predata WHERE id = '6'");
                $result6    =mysqli_fetch_array($query6);

            ?>

    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">

                    <div class="item service-item">
                        <div class="icon">
                            <i>
                                @foreach ($gambar1 as $gr)
                                <img src="{{ url('images/'. $gr->gambar) }}" alt="">
                                @endforeach
                            </i>
                        </div>
                        <h5 class="service-title"><?php echo $result['judul_data'] ?></h5>
                        <p>&nbsp;</p>
                        <a href="#" class="main-button">{{ count($pasien) }} Orang</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i>
                                @foreach ($gambar2 as $gs)
                                <img src="{{ url('images/'. $gs->gambar) }}" alt="">
                                @endforeach
                            </i>
                        </div>
                        <h5 class="service-title"><?php echo $result2['judul_data'] ?></h5>
                        <p>&nbsp;</p>
                        <a href="#" class="main-button">{{ count($lakis) }} Orang</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i>
                                @foreach ($gambar3 as $gy)
                                <img src="{{ url('images/'. $gy->gambar) }}" alt="">
                                @endforeach
                            </i>
                        </div>
                        <h5 class="service-title"><?php echo $result3['judul_data'] ?></h5>
                        <p>&nbsp;</p>
                        <a href="#" class="main-button">{{ count($perempuans) }} Orang</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i>
                                @foreach ($gambar4 as $gd)
                                <img src="{{ url('images/'. $gd->gambar) }}" alt="">
                                @endforeach
                            </i>
                        </div>
                        <h5 class="service-title"><?php echo $result4['judul_data'] ?></h5>
                        <p>&nbsp;</p>
                        <a href="#" class="main-button">{{ count($ruangan) }} Buah</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i>
                                @foreach ($gambar5 as $gt)
                                <img src="{{ url('images/'. $gt->gambar) }}" alt="">
                                @endforeach
                            </i>
                        </div>
                        <h5 class="service-title"><?php echo $result5['judul_data'] ?></h5>
                        <p>&nbsp;</p>
                        <a href="#" class="main-button">{{ count($tempattidur) }} Buah</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i>
                                @foreach ($gambar6 as $gf)
                                <img src="{{ url('images/'. $gf->gambar) }}" alt="">
                                @endforeach
                            </i>
                        </div>
                        <h5 class="service-title"><?php echo $result6['judul_data'] ?></h5>
                        <p>&nbsp;</p>
                        <a href="#" class="main-button">{{ count($sisa) }} Buah</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->



    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p style="text-align: center;" class="copyright">Copyright &copy; 2022 Sisfo Tempat Tidur RS Salamun </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="{{URL::asset('assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{URL::asset('assets/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{URL::asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{URL::asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/imgfix.min.js')}}"></script> 
    
    <!-- Global Init -->
    <script src="{{URL::asset('assets/js/custom.js')}}"></script>

    <!-- Slick JS -->    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Our Script -->
    <script>
        $(document).ready(function(){
            $('.slider').slick({
            autoplay: true,
            autoplaySpeed: 2500
            });
        });
    </script>

    <script src="{{URL::asset('kalender/js/moment-with-locales.min.js')}}"></script>
    <script src="{{URL::asset('kalender/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{URL::asset('kalender/js/main.js')}}"></script>


  </body>
</html>