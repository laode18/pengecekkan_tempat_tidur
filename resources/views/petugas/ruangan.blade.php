@extends('layouts.petugas.app')
@section('content')

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container">
                    <h2 class="h3 mb-2 text-gray-800">Data Ruangan</h2>
                    <br />
                @include('layouts.messages')
                <br />
                    <a data-toggle="modal" data-target="#addModal">
                        <button class="bi bi-plus-circle-fill btn" style="background-color: purple; color:white;"> Tambah Data</button>
                    </a>
                    </div>
                    <br/>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%); width: 100%;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" style="background-color: white; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center; width: 10%;">No.</th>
                                            <th style="vertical-align: middle; text-align: center; width: 30%;">Nama Ruangan</th>
                                            <th style="vertical-align: middle; text-align: center; width: 15%;">Total Kapasitas</th>
                                            <th style="vertical-align: middle; text-align: center; width: 15%;">Total Terpakai</th>
                                            <th style="vertical-align: middle; text-align: center; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <?php 
                                        $no=1;
                                        $total_tidur = DB::table('tb_ruangan')->sum('jumlah');
                                        
                                    ?>
                                    <tbody>
                                    @foreach ($ruangan as $np)
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center;">{{$no++}}.</td>
                                        <td style="vertical-align: middle; text-align: center;">{{ $np->nama_ruangan }}</td>
                                        <td style="vertical-align: middle; text-align: center;">{{ $np->jumlah }}</td>
                                        <?php 
                                            $terpakai = DB::table('tb_datatempattidur')
                                                ->where('id_ruangan', $np->id_ruangan)->whereNull('tanggal_keluar')->count('id_ruangan');
                                        ?>
                                        <td style="vertical-align: middle; text-align: center;">{{ $terpakai }}</td>
                                        <td style="text-align: center;">
                                            <div class="container mb-0">
                                                <button data-toggle="modal" data-target="#editModal{{ $np->id_ruangan }}" class="bi bi-pencil-square editbtn btn btn-warning col-xl-3 col-md-4 mb-2" style="font-size: 1.3rem; color:white;" role="button"></button>
                                                <button data-toggle="modal" data-target="#my-modal{{ $np->id_ruangan }}" class="bi bi-trash-fill btn btn-danger col-xl-3 col-md-4 mb-2" style="font-size: 1.2rem; color:white;" role="button"></button>
                                                <button class="bi bi-eye-fill detailbtn btn btn-info col-xl-3 col-md-4 mb-2" data-toggle="modal" data-target="#myModal{{ $np->id_ruangan }}" style="font-size: 1.3rem; color:white;" role="button"></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Tempat Tidur</b></td>
                                        <td style="vertical-align: middle; text-align: center;"><b>{{ $total_tidur }}</b></td>
                                        <td style="vertical-align: middle; text-align: center;"><b>{{ $tor }}</b></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
            <!-- End of Main Content -->


    @foreach ($ruangan as $np)
    <div id="my-modal{{ $np->id_ruangan }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">   
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                        <p class="font-weight-bold mb-2" style="color: black;"> Are you sure you wanna delete this ?</p><p class="text-muted "> These changes will be visible on your portal and the data will be deleted.</p>     </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
                            <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button><a class="btn btn-danger px-4" href="/petugas/ruangan/{{ $np->id_ruangan }}" role="button">Delete</a></div><div class="col-auto"></div></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
    @foreach ($ruangan as $np)
    <div id="myModal{{ $np->id_ruangan }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
             <div class="modal-content" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);">
                <div class="modal-header text-white">
                <h4>Detail Data Ruangan</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal">&times;</button>
                    </div>
                <div class="modal-body text-white">
                    <div class="row">
                    <div class="col-lg-12">
                    <table class="table table-bordered no-margin" style="background-color: white;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Nama Ruangan</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->nama_ruangan }}</td>
                        </tr>
                        
                    </thead>
                    </table>
                 </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
   
    @foreach ($ruangan as $np)
    <div class="modal fade" id="editModal{{ $np->id_ruangan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);">
                <div class="modal-header text-white">
                    <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-white">
                <form action="{{ url('/petugas/ruangan/update',  $np->id_ruangan) }}" method="POST" id="editform">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" class="form-control" required="required" value="{{ $np->nama_ruangan }}">
                </div>
                <div class="form-group">
                    <label>Total Kapasitas</label>
                    <input type="text" name="jumlah" class="form-control" required="required" value="{{ $np->jumlah }}">
                </div>
                
                <br />
                <div class="modal-footer">
                <center><button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button></center>
                <center><button type="submit" class="btn btn-primary">Simpan</button></center>
                </div>
            </form>
            </div>
            </div>
        </div>
        
    </div>
    @endforeach


    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);">
                <div class="modal-header text-white">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-white">
                <form action="{{ route('petugas.storeruangan') }}" method="POST" id="editform" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" class="form-control" required="required" placeholder="Nama Ruangan">
                </div>
                <div class="form-group">
                    <label>Total Kapasitas</label>
                    <input type="text" name="jumlah" class="form-control" required="required" placeholder="Jumlah">
                </div>
                
                <br />
                <div class="modal-footer">
                <center><button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button></center>
                <center><button type="submit" class="btn btn-primary">Simpan</button></center>
                </div>
            </form>
            </div>
            </div>
        </div>
        
    </div>

<script>
        $('.datepicker2').datepicker({
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>
<script>
        $('.datepicker3').datepicker({
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>
<script>
        $('#datepicker4').datepicker({
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>

@endsection