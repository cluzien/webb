<?php
include 'koneksi.php'; // Pastikan file koneksi.php ada

// Fungsi untuk mendapatkan semua data
function getAllData($conn) {
    $query = "SELECT * FROM data_table";
    return mysqli_query($conn, $query);
}

// Fungsi untuk menambah data
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = "INSERT INTO data_table (name, email) VALUES ('$name', '$email')";
    mysqli_query($conn, $query);
    header("Location: admin.php");
}

// Fungsi untuk menghapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM data_table WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: admin.php");
}

// Fungsi untuk memperbarui data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = "UPDATE data_table SET name='$name', email='$email' WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - CRUD</title>
</head>
<body>
    <h1>Admin CRUD</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= isset($_GET['edit']) ? $_GET['edit'] : '' ?>">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="<?= isset($_GET['edit']) ? 'update' : 'create' ?>">
            <?= isset($_GET['edit']) ? 'Update' : 'Create' ?>
        </button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = getAllData($conn);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a href='admin.php?edit={$row['id']}'>Edit</a> | 
                    <a href='admin.php?delete={$row['id']}'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
