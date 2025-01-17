<?php
include 'koneksi.php';


// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// exit; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password_baru = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Query untuk update password berdasarkan username
    $query = "UPDATE tb_user SET password='$password_baru' WHERE username='$username'";
    $result = mysqli_query($konek, $query);

    if ($result) {
        echo "
            <script>
            alert('Password berhasil diperbarui!');
            window.location.href='kelolauser.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Gagal memperbarui password!');
            window.location.href='kelolauser.php';
            </script>
        ";
    }
}
?>
