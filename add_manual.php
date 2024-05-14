<?php
// memanggil file koneksi database
require 'koneksi.php';

// uji jika tombol simpan di klik
if(isset($_POST['tsimpan'])) {

    $simpan = mysqli_query($conn, "INSERT INTO barangmasuk (kode, tgl, namaProduct, oleh, warna, size, jumlah) VALUES
                            ('$_POST[tkode]',
                             '$_POST[ttanggal]',
                             '$_POST[tnamaproduct]',
                             '$_POST[toleh]',
                             '$_POST[twarna]',
                             '$_POST[tsize]',
                             '$_POST[tjumlah]', ) ");

// Jika Berhasil maka
if ($simpan) {
    echo "<srcipt> alert ('Data Berhasil dI Simpan'); 
            document.location='manual.php';
            </srcipt>";
} else{
    echo "<srcipt> alert ('Data Berhasil dI Simpan'); 
            document.location='manual.php';
            </srcipt>";
}

}

?>
