<?php

// koneksi ke database
$conn = mysqli_connect("sql109.epizy.com", "	epiz_31140428", "7OBQl5GpPcp", "epiz_31140428_phpdasar");
function query($query)
{

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    global $conn;
    $judulBuku = htmlspecialchars($data["judul_buku"]);
    $kodeBuku = htmlspecialchars($data["kode_buku"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $query =  "INSERT INTO buku 
                VALUES
                ( '', '$judulBuku', '$kodeBuku', '$penulis', '$penerbit', '$gambar')
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload

    if ($error === 4) {

        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }
    // user di haruskan upload gambar/bukan file yang lain
    $ekstensiGambarValid = ['jpeg', 'jpg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }
    // cek jika ukuranya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }
    // lolos pengecekan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $judulBuku = htmlspecialchars($data["judul_buku"]);
    $kodeBuku = htmlspecialchars($data["kode_buku"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    $gambar = htmlspecialchars($data["gambar"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar =  upload();
    }
    $query =  "UPDATE buku SET
                    judul_buku = '$judulBuku',
                    kode_buku = '$kodeBuku',
                    penulis = '$penulis',
                    penerbit = '$penerbit',
                    gambar = '$gambar'
                    WHERE id = $id             
                    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function cari($keyword)
{
    $query = "SELECT * FROM buku 
            WHERE
            judul_buku LIKE '%$keyword%' OR
            kode_buku LIKE '%$keyword%'OR
            penulis LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%'          
            ";
    return query($query);
}
