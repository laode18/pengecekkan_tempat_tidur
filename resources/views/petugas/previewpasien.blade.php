@extends('layouts.petugas.app')
@section('content')

<!-- Begin Page Content -->
                <div class="container">
                <h2 class="h4 mb-0 text-gray-800">Preview Data Pasien</h2>
                </div>
                <br>
                <br />
                <div class="container-fluid">
                	<a href="/petugas/laporanberkas">
                        <button class="bi bi-arrow-left-circle-fill btn" style="background-color: purple; color:white;"> Kembali</button>
                    </a>
                	<a class="no-print btn btn-sm btn-success" style="float: right; margin-right: 25px; font-size: 16px;" onclick="CreatePDFfromHTML()" ><span class="fa fa-download"></span> &nbsp; Download</a>
    				<br /><br /><br />

                <div id="halaman1">
                <table class="table table-bordered" style="text-align: center;">
				  <thead style="background-color: grey;" class="p2">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">No KTP</th>
				      <th scope="col">Nama Pasien</th>
				      <th scope="col">Jenis Kelamin</th>
				      <th scope="col">Alamat</th>
				      <th scope="col">Tanggal Lahir</th>
				    </tr>
				  </thead>
				  <tbody class="p1">
				  	<?php $no=1; ?>
				  	@foreach ($pasien as $ps)
				    <tr>
				      <td>{{ $no++ }}</th>
				      <td>{{ $ps->no_ktp }}</td>
				      <td>{{ $ps->nama_pasien }}</td>
				      <td>{{ $ps->jenis_kelamin }}</td>
				      <td>{{ $ps->alamat }}</td>
				      <td>{{ tanggal_indonesia1($ps->tanggal_lahir) }}</td>
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
        pdf.save("datapasien.pdf");
    });
}
</script>

@endsection