<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$id = $_GET['id'];
$query = mysqli_query($connection, "select * from mahasiswa WHERE id_mahasiswa='$id'");

$html = '<center><h3>Data Detail Jual</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
  <tr>
  <th>No</th>
  <th>id jual</th>
  <th>id barang</th>
  <th>Harga</th>
  <th>Qty</th>
  <th>Total</th>
  </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
  $html .= "<tr><td>" . $no . "</td><td>" . $row['nim'] . "</td><td>" . $row['nama'] . "</td><td>" . $row['kelas'] . "</td><td>" . $row['jurusan'] . "</td><td>";
  $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_detail_jual.pdf');
