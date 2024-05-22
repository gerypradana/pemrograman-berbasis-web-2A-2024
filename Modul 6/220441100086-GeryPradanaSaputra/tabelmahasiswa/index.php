<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabel Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Mahasiswa</a>
    </nav>
<div class="container">
    <br>
    <h4><center>Daftar mahasiswa</h4>
<?php
    include "koneksi.php";

    if (isset($_GET["id"])) {
        $id = ($_GET["id"]);

        $sql = "DELETE FROM dbmahasiswa WHERE id = '$id'";
        $hasil = mysqli_query($kon, $sql);

        if ($hasil) {
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
        }
      
    }
?>

            <br>
            <thead>
            <tr>
            <table class="my-2 table table-bordered">
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Jurusan</th>
                    <th>Asal Kota</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM dbmahasiswa ORDER BY id ";
            $hasil = mysqli_query($kon, $sql);
            while ($data = mysqli_fetch_array($hasil)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($data["id"]); ?></td>
                    <td><?php echo htmlspecialchars($data["nama"]); ?></td>
                    <td><?php echo htmlspecialchars($data["nim"]); ?></td>
                    <td><?php echo htmlspecialchars($data["umur"]); ?></td>
                    <td><?php echo htmlspecialchars($data["jenis_kelamin"]); ?></td>
                    <td><?php echo htmlspecialchars($data["prodi"]); ?></td>
                    <td><?php echo htmlspecialchars($data["jurusan"]); ?></td>
                    <td><?php echo htmlspecialchars($data["asal_kota"]); ?></td>
                    <td>
                        <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                        <a href="<?php ($_SERVER["PHP_SELF"]); ?>?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-danger" role="button">Delete</a>
                    </td>
                </tr>
                <?php
            }
            
            ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>    
    
</body>
</html>
