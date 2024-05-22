<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        // koneksi ke database 
        include "koneksi.php";

        function input($data) {
            return $data;
        }

        // cek apakah ada nilai yang dikirim menggunakan method GET dengan nama id
        if (isset($_GET['id'])) {
            $id = input($_GET["id"]);

            $sql = "SELECT * FROM dbmahasiswa WHERE id = $id";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }

        //mengecek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama = input($_POST["nama"]);
            $nim = input($_POST["nim"]);
            $umur = input($_POST["umur"]);
            $jenis_kelamin = input($_POST["jenis_kelamin"]);
            $prodi = input($_POST["prodi"]);
            $jurusan = input($_POST["jurusan"]);
            $asal_kota = input($_POST["asal_kota"]);

            //update data pada tabel mahasiswa
            $sql = "UPDATE dbmahasiswa SET
                nama='$nama',
                nim='$nim',
                umur='$umur',
                jenis_kelamin='$jenis_kelamin',
                prodi='$prodi',
                jurusan='$jurusan',
                asal_kota='$asal_kota'
                WHERE id='$id'";

            //menjalankan hasil
            $hasil = mysqli_query($kon, $sql);

            // mengecek apakah berhasil / tidak
            if ($hasil) {
                header("Location: index.php");
            } else {
                echo "<div class='alert alert-danger'>Data Gagal disimpan</div>";
            }
        }

        ?>
        <h2>Update Data</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id=$id"; ?>" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama" value="<?php echo $data['nama']; ?>" required />
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukan NIM" value="<?php echo $data['nim']; ?>" required />
            </div>

            <div class="mb-3">
                <label for="umur" class="form-label">Umur:</label>
                <input type="text" name="umur" class="form-control" id="umur" placeholder="Masukan Umur" value="<?php echo $data['umur']; ?>" required />
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <select name="jenis_kelamin"  id="jenis_kelamin" class="form-select">
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>    
            </div>

            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi:</label>
                <input name="prodi" class="form-control" id="prodi" placeholder="Masukan Prodi" value="<?php echo $data['prodi']; ?>" required />
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input name="jurusan" class="form-control" id="jurusan" placeholder="Masukan Jurusan" value="<?php echo $data['jurusan']; ?>" required />
            </div>

            <div class="mb-3">
                <label for="asal_kota" class="form-label">Asal Kota:</label>
                <input name="asal_kota" class="form-control" id="asal_kota" placeholder="Masukan Asal Kota" value="<?php echo $data['asal_kota']; ?>" required />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
