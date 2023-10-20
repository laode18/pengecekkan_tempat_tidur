@extends('layouts.admin.app')
@section('content')

<!-- Begin Page Content -->
                <div class="container">
                <h2 class="h4 mb-0 text-gray-800">Dashboard</h2>
                </div>
                <br>
                <br />
                <div class="container-fluid">


                    <!-- Content Row -->
                    <div class="row justify-content-evenly">

                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-4 col-md-16 mb-12">
                            <div class="card border-left-success shadow h-400 py-1" style="background-color: purple; width: 330px; height: 320px;">
                                <div class="card-body" style="text-align: center;">
                                    <div class="container">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">
                                                <h2><strong>Jumlah Pasien</strong></h2></div>
                                                    <br><br>
                                        </div>
                                        <center>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-4x text-white"></i>
                                        </div><br><br>
                                        </center>

                                        <div class="h4 mb-0 font-weight-bold text-white">{{ count($pasien) }} Orang</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-16 mb-12">
                            <div class="card border-left-success shadow h-400 py-2" style="background-color: purple; width: 330px; height: 320px;">
                                <div class="card-body" style="text-align: center;">
                                    <div class="container">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">
                                                <h2><strong>Jumlah Petugas</strong></h2></div>
                                                <br><br>
                                        </div>
                                        <center>
                                        <div class="col-auto">
                                            <i class="fas fa-user-nurse fa-4x text-white"></i>
                                        </div><br><br>
                                        </center>
                                        <div class="h4 mb-0 font-weight-bold text-white">{{ count($petugas) }} Orang</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-16 mb-12">
                            <div class="card border-left-success shadow h-400 py-2" style="background-color: purple; width: 330px; height: 320px;">
                                <div class="card-body" style="text-align: center;">
                                    <div class="container">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4"><h2><strong>Jumlah Tempat Tidur</strong></h2>
                                            </div>
                                            <br><br>
                                        </div>
                                        <center>
                                        <div class="col-auto">
                                            <i class="fas fa-bed fa-4x text-white"></i>
                                        </div><br><br>
                                        </center>
                                        <div class="h4 mb-0 font-weight-bold text-white">{{ count($berkas) }} Buah</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                    
            <!-- End of Main Content -->

            </div>

@endsection