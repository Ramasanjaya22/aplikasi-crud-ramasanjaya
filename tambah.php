<?php
require "functions.php";
// koneksi ke DBMS
$conn = mysqli_connect("sql109.epizy.com", "	epiz_31140428", "
7OBQl5GpPcp", "epiz_31140428_phpdasar");
// cek apakah tombol sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "      
           <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "       
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Tambah Buku</title>
</head>

<body style="background-color: #6f00ff;">
    <div class="container bg-light my-5" style="border-radius:20px;">
        <div class="text-center">
            <h1> Tambah Buku </h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <ul class="list-group">
                <li class="list-group-item">
                    <label for="judulBuku">judul Buku : </label>
                    <input class="form-control" type="text" name="judul_buku" id="judulBuku" required>
                </li>
                <li class="list-group-item">
                    <label for="kodeBuku">kode buku : </label>
                    <input class="form-control" type="text" name="kode_buku" id="kodeBuku">
                </li>
                <li class="list-group-item">
                    <label for="penulis">penulis : </label>
                    <input class="form-control" type="text" name="penulis" id="penulis">
                </li>
                <li class="list-group-item">
                    <label for="penerbit">penerbit : </label>
                    <input class="form-control" type="text" name="penerbit" id="penerbit">
                </li>
                <li class="list-group-item">
                    <label for="gambar">Gambar : </label>
                    <input type="file" name="gambar" id="gambar">
                </li>
                <button type="submit" name="submit" class="btn btn-primary"> Tambah Buku !</button>
            </ul>
        </form>
        <a href="index.php" class="btn btn-secondary my-2">Kembali ke halaman sebelumnya</a>

    </div>
</body>

</html>