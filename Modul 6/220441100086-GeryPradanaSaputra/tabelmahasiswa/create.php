<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penambahan Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    // menyertakan file koneksi, untuk koneksi ke database
    include "koneksi.php";

    // fungsi untuk mencegah inputan karakter yang tidak_ sesuai
    function input($data) {
        return $data;
    }

    // mengecek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = input($_POST["nama"]);
        $nim = input($_POST["nim"]);
        $umur = input($_POST["umur"]); 
        $jenis_kelamin = input($_POST["jenis_kelamin"]);  
        $prodi = input($_POST["prodi"]); 
        $jurusan = input($_POST["jurusan"]); 
        $asal_kota = input($_POST["asal_kota"]); 

        // inputan akan memasukkan data ke dalam tabel mahasiswa
        $sql = "INSERT INTO dbmahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) 
                values ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";
        
        // menjalankan perintah di atas
        $hasil = mysqli_query($kon, $sql);

        // kondisi apakah berhasil / tidak dalam mengeksekusi perintah di atas
        if ($hasil) {
            header("location:index.php");
        } else {
            echo "<div class='alert alert-danger'>data gagal disimpan</div>";
        }
    } 
    ?>
    <h2>Input Data Mahasiswa</h2>
    <form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required />
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM:</label>
            <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM" required />
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur:</label>
            <input type="text" name="umur" class="form-control" id="umur" placeholder="Masukkan Umur" required />
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <select name="jenis_kelamin"  id="jenis_kelamin" class="form-select">
                    <option>Pilih Jenis kelamin </option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>    
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi:</label>
            <input type="text" name="prodi" class="form-control" id="prodi" placeholder="Masukkan Prodi" required />
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Masukkan jurusan" required />
        </div>

        <div class="mb-3">
            <label for="asal_kota" class="form-label">Asal Kota:</label>
            <input type="text" name="asal_kota" class="form-control" id="asal_kota" placeholder="Masukkan Asal Kota" required />
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>    
</body>
</html>
