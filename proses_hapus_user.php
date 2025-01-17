<?php
include 'koneksi.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Query untuk menghapus data berdasarkan username
    $query = "DELETE FROM tb_user WHERE username = ?";
    $stmt = mysqli_prepare($konek, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);

    if (mysqli_stmt_execute($stmt)) {
        echo "
            <script>
            alert('Data berhasil dihapus!');
            window.location.href = 'kelolauser.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Gagal menghapus data!');
            window.location.href = 'kelolauser.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
        alert('Tidak ada data yang dipilih!');
        window.location.href = 'kelolauser.php';
        </script>
    ";
}
?>
