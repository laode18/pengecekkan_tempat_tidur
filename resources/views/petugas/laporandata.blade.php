@extends('layouts.petugas.app')
@section('content')

<!-- Begin Page Content -->
                <div class="container">
                <h2 class="h4 mb-0 text-gray-800">Laporan Data</h2>
                </div>
                <br>
                <br />
                <div class="container-fluid">


                    <!-- Content Row -->
                    <div class="row justify-content-evenly">

                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-200 py-1" style="background-color: purple;">
                                <div class="card-body" style="height: 300px; text-align: center;">
                                    <div class="container">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">
                                                <h2>Data Pasien</h2></div>
                                                    <br>
                                            
                                        </div>
                                        <center>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-5x text-white"></i>
                                        </div>
                                        </center>
                                        <p>&nbsp;</p>
                                        <div class="h4 mb-0 font-weight-bold text-white">
                                            <a href="/petugas/laporanberkas/previewpasien"><button class="bi bi-eye-fill editbtn btn btn-primary col-xl-4 col-md-4 mb-2" style="font-size: 1.5rem; color:white;" role="button">&nbsp; Preview</button></a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-200 py-1" style="background-color: purple;">
                                <div class="card-body" style="height: 300px; text-align: center;">
                                    <div class="container">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">
                                                <h2>Data Pemakaian Tempat Tidur</h2></div>
                                                    <br>
                                            
                                        </div>
                                        <center>
                                        <div class="col-auto">
                                            <i class="fas fa-bed fa-5x text-white"></i>
                                        </div>
                                        </center>
                                        <p>&nbsp;</p>
                                        <div class="h4 mb-0 font-weight-bold text-white">
                                            <a href="/petugas/laporanberkas/previewberkas"><button class="bi bi-eye-fill editbtn btn btn-primary col-xl-4 col-md-4 mb-2" style="font-size: 1.5rem; color:white;" role="button">&nbsp; Preview</button></a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />

            </div>

@endsection