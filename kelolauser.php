<!doctype html>

<?php

session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
  header('location:login.php');
  exit;
}



include 'koneksi.php';
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Kelola User </title>
  </head>
  <body>
      <div class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand">Dashboard </a>
              <!-- <form class="d-flex ms-auto">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form> -->
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="crud.php">Home</a>
                </li>
              </ul>
              <ul class="navbar-nav ms-2">
                <li class="nav-item">
                  <button class="btn btn-outline-danger">
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                  </button>
                </li>
              </ul>
            </div>
          </nav>

          <figure class="text-center mt-5 ">
            <blockquote class="blockquote">
              <p>Data User</p>
            </blockquote>
            <figcaption class="blockquote-footer">
              <cite title="Source Title">Update And Delete</cite>
            </figcaption>
          </figure>
          
          <table class="table table-hover table-bordered align-middle ">
            <thead>
              <tr class="table-dark text-center" >
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              $query = "SELECT * FROM tb_user";
              $sql = mysqli_query($konek, $query);
              $no=1;
              while ($data = mysqli_fetch_array($sql)) {
              ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?php echo $data['username']; ?></td>
                  <td><?php echo $data['password']; ?></td>
                  <td><?php echo $data['role']; ?></td>
                  
                  <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPasswordModal<?php echo $data['username']; ?>">Edit Password</button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $data['username']; ?>">Hapus</button>
                </td>
                </tr>
              <?php
                $no++;
              } ?> 
            </tbody>
          </table>
      </div>

      <?php
        // Contoh query untuk mendapatkan data user
        $query = mysqli_query($konek, "SELECT * FROM tb_user");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <!-- Tombol untuk membuka modal -->
            

            <!-- Modal untuk user ini -->
            <div class="modal fade" id="editPasswordModal<?php echo $data['username']; ?>" tabindex="-1" aria-labelledby="editPasswordModalLabel<?php echo $data['username']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPasswordModalLabel<?php echo $data['username']; ?>">Edit Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="proses_edit_password.php" method="POST">
                            <div class="modal-body">
                                <!-- Hidden input untuk username -->
                                <input type="hidden" name="username" value="<?php echo $data['username']; ?>">
                                
                                <!-- Username (tidak bisa diubah) -->
                                <div class="mb-3">
                                    <label for="username<?php echo $data['username']; ?>" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username<?php echo $data['username']; ?>" name="username_disabled" value="<?php echo $data['username']; ?>" disabled>
                                </div>
                                
                                <!-- Password baru -->
                                <div class="mb-3">
                                    <label for="password<?php echo $data['username']; ?>" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" id="password<?php echo $data['username']; ?>" name="password" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <?php
        // Contoh query untuk mendapatkan data user
        $query = mysqli_query($konek, "SELECT * FROM tb_user");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        
        <!-- Modal Hapus -->
        <div class="modal fade" id="deleteModal<?php echo $data['username']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus user <strong><?php echo $data['username']; ?></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="proses_hapus_user.php?username=<?php echo $data['username']; ?>" class="btn btn-danger">Hapus</a>
            </div>
            </div>
        </div>
        </div>
        <?php
        }
        ?>

        
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>