<?php
require "functions.php";

$bk = query("SELECT * FROM buku");

// tombol cari ditekan

if (isset($_POST["cari"])) {

    $bk = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Web Buku</title>
</head>

<body class="bg-gradient" style="background-color: #6f00ff;">
    <div class="container bg-light mb-2" style="border-radius:20px;">
        <!-- heading -->
        <div class="container">
            <div class=" text-center">
                <h1 class="fw-bold mt-4">LIST BUKU <span>
                        <img src="img/magic-book.png" alt="" width="50" class="mb-4">
                    </span></h1>
                <h4 class="text-secondary"><i>Berikut adalah list buku populer di Gramedia</i></h4>
            </div>
            <div class="container">
                <form action="" method="post">
                    <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian " autocomplete="off" class="py-1 px-1 mb-2">
                    <button class="btn btn-warning mb-2 my-1 text-light" type="submit" name="cari"> Cari </button>
                </form>
            </div>
            <!-- adding item -->
            <div class="container">
                <div class="text-start">
                    <a href="tambah.php" class="btn btn-primary mb-2">Tambah Buku</a>
                </div>
            </div>
        </div>
        <!-- table -->
        <div class="container">
            <div class="text-center">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Judul Buku</th>
                        <th>Kode Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Gambar</th>
                    </tr>
                    <?php $i = 1;  ?>
                    <?php foreach ($bk as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td>
                                <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-secondary">ubah</a> |
                                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin akan di hapus');" class="btn btn-danger">hapus</a>
                            </td>
                            <td><?= $row["judul_buku"]; ?></td>
                            <td><?= $row["kode_buku"]; ?></td>
                            <td><?= $row["penulis"]; ?></td>
                            <td><?= $row["penerbit"]; ?></td>
                            <td><img src="img/<?= $row["gambar"]; ?>" width="100" alt=""></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>