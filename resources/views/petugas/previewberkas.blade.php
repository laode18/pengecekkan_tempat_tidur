@extends('layouts.petugas.app')
@section('content')

<!-- Begin Page Content -->
                <div class="container">
                <h2 class="h4 mb-0 text-gray-800">Preview Data Pemakaian Tempat Tidur</h2>
                </div>
                <br>
                <br />
                <div class="container-fluid">
                	<a href="/petugas/laporanberkas" style="float: left;">
                        <button class="bi bi-arrow-left-circle-fill btn" style="background-color: purple; color:white;">&nbsp; Kembali</button>
                    </a>
                    <div style="background-color: purple; color: white; width: 20%; text-align:center; float: left; margin-left: 30px;">
                        <select class="form-select form-select-md" onchange="namaBulan()" id="namabulan" aria-label="Default select example" style="background: purple; color: #fff; text-align:center;">
                          <option value="" hidden>Pilih Bulan</option>
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">Februari</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                      </select>
                  </div>
                	<a class="no-print btn btn-sm btn-success" style="float: right; margin-right: 25px; font-size: 16px;" onclick="CreatePDFfromHTML()" ><span class="fa fa-download"></span> &nbsp; Download</a>
    				<br /><br /><br />

                <div id="halaman1">
                <table class="table table-bordered" id="datasTable" style="text-align: center;">
				  <thead style="background-color: grey;" class="p2">
				    <tr>
                      <th scope="col">No</th>
				      <th scope="col">No KTP</th>
				      <th scope="col">Nama Pasien</th>
				      <th scope="col">Jenis Kelamin</th>
				      <th scope="col">Nomor Tempat Tidur</th>
				      <th scope="col">Ruangan</th>
				      <th scope="col">Tanggal Masuk</th>
                      <th scope="col">Tanggal Keluar</th>
				      <th scope="col">Keterangan</th>
				    </tr>
				  </thead>
				  <tbody class="p1">
				  	<?php $no=1; ?>
				  	@foreach ($berkas as $ps)
				    <tr>
                      <td>{{ $no++ }}</td>      
				      <td>{{ $ps->no_ktp }}</td>
				      <td>{{ $ps->nama_pasien }}</td>
				      <td>{{ $ps->jenis_kelamin }}</td>
				      <td>{{ $ps->no_tempat_tidur }}</td>
				      <td>{{ $ps->nama_ruangan }}</td>
				      <td>{{ $ps->tanggal_pakai }}</td>
                      <td>{{ $ps->tanggal_keluar }}</td>
				      <td>{{ $ps->keterangan }}</td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
				</div>

                    <br />

            </div>

            <textarea id="printing-css" style="display:none;">html,body,halaman1.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="#" style="display:none;"></iframe>

<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script type="text/javascript">
  //Create PDf from HTML...
function CreatePDFfromHTML() {
    var HTML_Width = $("#halaman1").width();
    var HTML_Height = $("#halaman1").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($("#halaman1")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("datapeminjaman_tempattidur.pdf");
    });
}
</script>

<script type="text/javascript">
    function namaBulan () {
        let namabulan = $("#namabulan").val()
        $("#datasTable tbody").children().remove();
        if (namabulan!='' && namabulan!=null) {
            $.ajax({
            url: '{{ url('') }}/petugas/laporanberkas/previewberkas/bulan/'+namabulan,
            success: function(res){
                    let datasTable = '';
                    $.each(res, function(index, data){
                        var tables = document.getElementsByTagName('table');
                                var table = tables[tables.length -1];
                                var rows = table.rows;
                        datasTable+=`
                            <tr>
                                for(var i = 0, td; i < rows.length; i++){
                                    td = document.createElement('td');
                                    td.appendChild(document.createTextNode(i + 1));
                                    rows[i].insertBefore(td, rows[i].firstChild);
                                }
                                <td style="vertical-align: middle; text-align: center;">${data.no_ktp}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.nama_pasien}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.jenis_kelamin}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.no_tempat_tidur}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.nama_ruangan}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.tanggal_pakai}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.tanggal_keluar}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.keterangan}</td>
                            </tr>
                        `
                    })
                    $("#datasTable tbody").append(datasTable);
            }
        });
        }
    }
</script>

@endsection