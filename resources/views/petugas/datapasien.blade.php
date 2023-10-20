@extends('layouts.petugas.app')
@section('content')

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container">
                    <h2 class="h3 mb-2 text-gray-800">Data Pasien</h2>
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
                                            <th style="vertical-align: middle; text-align: center; width: 25%;">Nama Pasien</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">Jenis Kelamin</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">Tanggal Lahir</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    
                                    <tbody>
                                    <?php $no=1; ?>
                                    @foreach ($pasien as $np)
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;">{{$no++}}.</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $np->nama_pasien }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $np->jenis_kelamin }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ tanggal_indonesia1($np->tanggal_lahir) }}</td>
                                            <td style="text-align: center;">
                                                <div class="container mb-0">
                                                <button data-toggle="modal" data-target="#editModal{{ $np->id_pasien }}" class="bi bi-pencil-square editbtn btn btn-warning col-xl-3 col-md-4 mb-2" style="font-size: 1.3rem; color:white;" role="button"></button>
                                                <button data-toggle="modal" data-target="#my-modal{{ $np->id_pasien }}" class="bi bi-trash-fill btn btn-danger col-xl-3 col-md-4 mb-2" style="font-size: 1.2rem; color:white;" role="button"></button>
                                                <button class="bi bi-eye-fill detailbtn btn btn-info col-xl-3 col-md-4 mb-2" data-toggle="modal" data-target="#myModal{{ $np->id_pasien }}" style="font-size: 1.3rem; color:white;" role="button"></button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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


    @foreach ($pasien as $np)
    <div id="my-modal{{ $np->id_pasien }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">   
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                        <p class="font-weight-bold mb-2" style="color: black;"> Are you sure you wanna delete this ?</p><p class="text-muted "> These changes will be visible on your portal and the data will be deleted.</p>     </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
                            <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button><a class="btn btn-danger px-4" href="/petugas/datapasien/{{ $np->id_pasien }}" role="button">Delete</a></div><div class="col-auto"></div></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
    @foreach ($pasien as $np)
    <div id="myModal{{ $np->id_pasien }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
             <div class="modal-content" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);">
                <div class="modal-header text-white">
                <h4>Detail Data Pasien</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal">&times;</button>
                    </div>
                <div class="modal-body text-white">
                    <div class="row">
                    <div class="col-lg-12">
                    <table class="table table-bordered no-margin" style="background-color: white;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Nama Pasien</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->nama_pasien }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Nomor KTP</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->no_ktp }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">No RM</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->no_rm }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Jenis Kelamin</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Alamat</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->alamat }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Tanggal Lahir</th>
                        <td style="vertical-align: middle; text-align: center;">{{ tanggal_indonesia1($np->tanggal_lahir) }}</td>
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
   
    @foreach ($pasien as $np)
    <div class="modal fade" id="editModal{{ $np->id_pasien }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);">
                <div class="modal-header text-white">
                    <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-white">
                <form action="{{ url('/petugas/datapasien/update',  $np->id_pasien) }}" method="POST" id="editform">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Nomor RM</label>
                    <input type="text" name="no_rm" class="form-control" required="required" value="{{ $np->no_rm }}">
                </div>
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" required="required" value="{{ $np->nama_pasien }}">
                </div>
                <div class="form-group">
                    <label>Nomor KTP</label>
                    <input type="text" name="no_ktp" class="form-control" required="required" value="{{ $np->no_ktp }}">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="{{ $np->jenis_kelamin}}" hidden>{{ $np->jenis_kelamin}}</option>
                        <option value="Laki-Laki" >Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" required="required" value="{{ $np->alamat }}">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="datepicker{{ $np->id_pasien }}"  name="tanggal_lahir" required="required" value="{{ $np->tanggal_lahir }}">
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
                <form action="{{ route('petugas.storedatapasien') }}" method="POST" id="editform" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nomor RM</label>
                    <input type="text" name="no_rm" class="form-control" required="required" placeholder="Nomor RM">
                </div>
                <div class="form-group">
                    <label>Nomor KTP</label>
                    <input type="text" name="no_ktp" class="form-control" required="required" placeholder="Nomor KTP">
                </div>
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" required="required" placeholder="Nama Pasien">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="" hidden>Jenis Kelamin</option>
                        <option value="Laki-Laki" >Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" required="required" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="datepicker2"  name="tanggal_lahir" required="required"  placeholder="Tanggal Lahir">
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
@foreach ($pasien as $np)
<script>
        $('.datepicker{{ $np->id_pasien }}').datepicker({
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>
@endforeach
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