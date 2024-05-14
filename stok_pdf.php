<?php
// memanggil library FPDF
require('fpdf184/fpdf.php');
include 'koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'DATA STOK ',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(20,7,'KODE' ,1,0,'C');
$pdf->Cell(50,7,'NAMA PRODUCT',1,0,'C');
$pdf->Cell(55,7,'JUMLAH',1,0,'C');
$pdf->Cell(55,7,'FILE QR',1,0,'C');

 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$ambildata = mysqli_query($conn,"SELECT  * FROM stok");
while($tampil = mysqli_fetch_array($ambildata)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(20,6, $tampil['kode'],1,0);
  $pdf->Cell(50,6, $tampil['namaProduct'],1,0);  
  $pdf->Cell(55,6, $tampil['jumlah'],1,0);
  
   

}
 
$pdf->Output();
 
?>