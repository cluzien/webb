<?php
   // session_start();
   // session_unset();
   // session_destroy();
   // header('location:login.php');

   session_start();
   session_unset(); // Menghapus semua session
   session_destroy(); // Mengakhiri session
   header('Location: login.php'); // Kembali ke halaman login
   exit();


?>