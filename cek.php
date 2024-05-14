<?php
//    mengecek apakah belum login akan kembali ke login
   if (isset($_SESSION['login'])) {
    

   } else {
     header ('location: login.php');
   }
?>