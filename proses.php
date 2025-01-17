<?php
include 'koneksi.php';
if(isset($_POST['btnproses'])){
    $nama = $_POST['nama'];
    $kopi = $_POST['kopi'];
    $bkopi = $_POST['bkopi'];

    
    if($_POST['btnproses']=="tambah"){
        $gambar = $_FILES['gambar']['name'];
        $dir="image/";
        $dirfile=$_FILES['gambar']['tmp_name'];
        move_uploaded_file($dirfile, $dir . $gambar);

        $query="INSERT INTO tb_produk VALUES('','$nama','$kopi','$bkopi','$gambar')";
        $sql=mysqli_query($konek, $query);
        if($sql){
            header('location:crud.php');
        }
    }else {
        if($_FILES['gambar']['name']){
            $queryHapus="SELECT gambar FROM tb_produk WHERE No='$_POST[id]'";
            $sqlHapus=mysqli_query($konek, $queryHapus);
            $data=mysqli_fetch_array($sqlHapus);
            unlink("image/".$data['gambar']);

            $gambar = $_FILES['gambar']['name'];
            $dir="image/";
            $dirfile=$_FILES['gambar']['tmp_name'];
            move_uploaded_file($dirfile,$dir . $gambar);

            $query="UPDATE tb_produk SET Nama='$nama',`Nama Kopi`='$kopi',`Jenis Biji Kopi`='$bkopi',gambar='$gambar' WHERE No='$_POST[id]'";
            
        }else{
            $query="UPDATE tb_produk SET Nama='$nama',`Nama Kopi`='$kopi',`Jenis Biji Kopi`='$bkopi' WHERE No='$_POST[id]'";
        }
        $sql=mysqli_query($konek,$query);
            if($sql) {
                header('location:crud.php');
            }
    }
} elseif ($_GET['hapus']) {
    $queryHapus="SELECT gambar FROM tb_produk WHERE no='$_GET[hapus]'";
    $sqlHapus=mysqli_query($konek, $queryHapus);
    $data=mysqli_fetch_array($sqlHapus);

    unlink("image/".$data['gambar']);

    $query="DELETE FROM tb_produk WHERE no='$_GET[hapus]'";
    $sql=mysqli_query($konek,$query);
    if($sql) {
        header('location:crud.php');
    }
}

?>