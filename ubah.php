<?php
require "functions.php";
// ambil data di url 
$id = $_GET["id"];
$bk = query("SELECT * FROM buku WHERE id = $id")[0];
// koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "      
           <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "       
        <script>
            alert('data gagal diubah!');
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
    <title>Ubah Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color: #6f00ff;">
    <div class="container bg-light my-5" style="border-radius:20px;">
        <div class="text-center">
            <h1> Ubah Data Buku </h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $bk["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $bk["gambar"]; ?>">
            <ul>
                <li>
                    <label for="judulBuku">judulBuku : </label>
                    <input class="form-control" type="text" name="judul_buku" id="judulBuku" required value="<?= $bk["judul_buku"]; ?>">
                </li>

                <li>
                    <label for="kodeBuku">kode buku : </label>
                    <input class="form-control" type="text" name="kode_buku" id="kodeBuku" value="<?= $bk["kode_buku"]; ?>">
                </li>

                <li>
                    <label for="penulis">penulis : </label>
                    <input class="form-control" type="text" name="penulis" id="penulis" value="<?= $bk["penulis"]; ?>">
                </li>

                <li>
                    <label for="penerbit">penerbit : </label>
                    <input class="form-control" type="text" name="penerbit" id="penerbit" value="<?= $bk["penerbit"]; ?>">
                </li>

                <li>
                    <label for="gambar">Gambar : </label>
                    <div class="text-start mb-2">
                        <img src="img/<?= $bk["gambar"]; ?>" width="100" alt="">
                    </div>
                    <input type="file" name="gambar" id="gambar">
                </li>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit"> Ubah Data !</button>
                </div>
            </ul>
        </form>
        <a href="index.php" class="btn btn-secondary mb-2">Kembali ke halaman sebelumnya</a>
    </div>
</body>

</html>