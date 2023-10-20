@extends('layouts.petugas.app')
@section('content')

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container">
                    <h2 class="h3 mb-2 text-gray-800">Data Pemakaian Tempat Tidur</h2>
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
                                            <th style="vertical-align: middle; text-align: center; width: 15%;">Nama Pasien</th>
                                            <th style="vertical-align: middle; text-align: center; width: 10%;">No Tempat Tidur</th>
                                            <th style="vertical-align: middle; text-align: center; width: 15%;">Ruangan</th>
                                            <th style="vertical-align: middle; text-align: center; width: 15%;">Tanggal Masuk</th>
                                            <th style="vertical-align: middle; text-align: center; width: 15%;">Tanggal Keluar</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    
                                    <tbody>
                                    <?php $no=1; ?>
                                    @foreach ($datatempattidur as $np)
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;">{{$no++}}.</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $np->nama_pasien }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $np->no_tempat_tidur }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $np->nama_ruangan }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ ($np->tanggal_pakai) }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ ($np->tanggal_keluar) }}</td>
                                            <td style="text-align: center;">
                                                <div class="container mb-0">
                                                <button data-toggle="modal" data-target="#editModal{{ $np->id_datatidur }}" class="bi bi-pencil-square editbtn btn btn-warning col-xl-3 col-md-4 mb-2" style="font-size: 1.3rem; color:white;" role="button"></button>
                                                <button data-toggle="modal" data-target="#my-modal{{ $np->id_datatidur }}" class="bi bi-trash-fill btn btn-danger col-xl-3 col-md-4 mb-2" style="font-size: 1.2rem; color:white;" role="button"></button>
                                                <button class="bi bi-eye-fill detailbtn btn btn-info col-xl-3 col-md-4 mb-2" data-toggle="modal" data-target="#myModal{{ $np->id_datatidur }}" style="font-size: 1.3rem; color:white;" role="button"></button>
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


    @foreach ($datatempattidur as $np)
    <div id="my-modal{{ $np->id_datatidur }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">   
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                        <p class="font-weight-bold mb-2" style="color: black;"> Are you sure you wanna delete this ?</p><p class="text-muted "> These changes will be visible on your portal and the data will be deleted.</p>     </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
                            <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button><a class="btn btn-danger px-4" href="/petugas/datatempattidur/{{ $np->id_datatidur }}" role="button">Delete</a></div><div class="col-auto"></div></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
    @foreach ($datatempattidur as $np)
    <div id="myModal{{ $np->id_datatidur }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
             <div class="modal-content" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);">
                <div class="modal-header text-white">
                <h4>Detail Data Tempat Tidur</h4>
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
                        <th style="text-align: center;">Jenis Kelamin</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">No Tempat Tidur</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->no_tempat_tidur }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Kelas</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->kelas }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Ruangan</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->nama_ruangan }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Keterangan</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->keterangan }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Tanggal Masuk</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->tanggal_pakai }}</td>
                        </tr>
                        <tr>
                        <th style="text-align: center;">Tanggal Keluar</th>
                        <td style="vertical-align: middle; text-align: center;">{{ $np->tanggal_keluar }}</td>
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
   
    @foreach ($datatempattidur as $np)
    <div class="modal fade" id="editModal{{ $np->id_datatidur }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);">
                <div class="modal-header text-white">
                    <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-white">
                <form action="{{ url('/petugas/datatempattidur/update',  $np->id_datatidur) }}" method="POST" id="editform" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <select name="no_ktp" class="form-select" required>
                        @foreach ($pasien as $jb)
                            <option value="{{ $jb->no_ktp }}" {{ old('no_ktp', $np->no_ktp) == $jb->no_ktp ? 'selected' : null}}>{{ $jb->nama_pasien }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>No Tempat Tidur</label>
                    <select name="id_tempattidur" class="form-select" required>
                        @foreach ($tempattidur as $bj)
                            <option value="{{ $bj->id_tempattidur }}" {{ old('id_tempattidur', $np->id_tempattidur) == $bj->id_tempattidur ? 'selected' : null}} {{$bj->status}}>{{ $bj->no_tempat_tidur }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Ruangan</label>
                    <select name="id_ruangan" class="form-select" required>
                        @foreach ($ruangan as $bb)
                            <option value="{{ $bb->id_ruangan }}" {{ old('id_ruangan', $np->id_ruangan) == $bb->id_ruangan ? 'selected' : null}}>{{ $bb->nama_ruangan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input class="form-control"  name="keterangan" required="required" value="{{ $np->keterangan }}">
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input class="datepickers{{ $np->id_datatidur }}"  name="tanggal_pakai" required="required" value="{{ $np->tanggal_pakai }}">
                </div>
                <div class="form-group">
                    <label>Tanggal Keluar</label>
                    <input class="datepickerst{{ $np->id_datatidur }}"  name="tanggal_keluar" value="{{ $np->tanggal_keluar }}">
                </div>
                <input class="form-control"  name="status" required="required" value=" " hidden>
                
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
                <form action="{{ route('petugas.storedatatempattidur') }}" method="POST" id="editform" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <select name="no_ktp" class="form-select" required>
                        <option value="" hidden>Nama Pasien</option>
                        @foreach ($pasien as $jb)
                        <option value="{{ $jb->no_ktp }}">{{ $jb->nama_pasien }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>No Tempat Tidur</label>
                    <select name="id_tempattidur" class="form-select" required>
                        <option value="" hidden>No Tempat Tidur</option>
                        @foreach ($tempattidur as $bj)
                        <option value="{{ $bj->id_tempattidur }}" {{ $bj->status }}>{{ $bj->no_tempat_tidur }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Ruangan</label>
                    <select name="id_ruangan" class="form-select" required>
                        <option value="" hidden>Ruangan</option>
                        @foreach ($ruangan as $bb)
                        <option value="{{ $bb->id_ruangan }}">{{ $bb->nama_ruangan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input class="form-control"  name="keterangan" required="required" placeholder="Keterangan">
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input class="datepicker3"  name="tanggal_pakai" required="required" placeholder="Tanggal Masuk">
                </div>
                <div class="form-group">
                    <label>Tanggal Keluar</label>
                    <input class="datepicker4"  name="tanggal_keluar" placeholder="Tanggal Keluar">
                </div>
                <input class="form-control"  name="status" required="required" value="hidden" hidden>
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

@foreach ($datatempattidur as $np)
<script>
        $('.datepickers{{ $np->id_datatidur }}').datepicker({
            format: "yyyy-mm-dd",
            uiLibrary: 'bootstrap4'
        });
    </script>
@endforeach

@foreach ($datatempattidur as $np)
<script>
        $('.datepickerst{{ $np->id_datatidur }}').datepicker({
            format: "yyyy-mm-dd",
            uiLibrary: 'bootstrap4'
        });
    </script>
@endforeach

<script>
        $('.datepicker2').datepicker({
            format: "yyyy-mm-dd",
            uiLibrary: 'bootstrap4'
        });
    </script>
<script>
        $('.datepicker3').datepicker({
            format: "yyyy-mm-dd",
            uiLibrary: 'bootstrap4'
        });
    </script>
<script>
        $('.datepicker4').datepicker({
            format: "yyyy-mm-dd",
            uiLibrary: 'bootstrap4'
        });
    </script>

@endsection