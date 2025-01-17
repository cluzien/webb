<?php
// include 'koneksi.php';
// if(isset($_POST['btnLogin'])){
//     $username=$_POST['username'];
//     $password=$_POST['password'];
//     $role=$_POST['role'];

//     $query=mysqli_query($konek,"SELECT * FROM tb_user WHERE username='$username'");
//     $data=mysqli_fetch_array($query);

//     if(mysqli_num_rows($query)==1){
//         if(password_verify($password,$data['password'])){
            
//             session_start();
//             $_SESSION['username']=$data['username'];
//             header('location:cruduser.php');
//         }else{
//             header('location:login.php?pesan=Password Salah');
//         }
//     }else{
//         header('location:login.php?pesan=Username Salah');

//     }
// }

// login baru

include 'koneksi.php';
if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Pastikan input form mengirimkan 'role'

    $query = mysqli_query($konek, "SELECT * FROM tb_user WHERE username='$username'");
    $data = mysqli_fetch_array($query);

    if(mysqli_num_rows($query) == 1){
        if(password_verify($password, $data['password'])){
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role']; // Menyimpan role dalam session

            // Mengecek role untuk menentukan redirect
            if($data['role'] == 'admin'){
                header('location:crud.php'); // Halaman untuk admin
            } else {
                header('location:cruduser.php'); // Halaman untuk pengguna biasa
            }
        } else {
            header('location:login.php?pesan=Password Salah');
        }
    } else {
        header('location:login.php?pesan=Username Salah');
    }
}

?>

