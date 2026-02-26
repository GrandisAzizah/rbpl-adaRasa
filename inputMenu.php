<?php

// session_start();
// // user belum login
// if (!isset($_SESSION["login"])) {
//     header("location: login.php");
//     exit;
// }

require 'functions.php';
// cek apakah tombol sudah dipencet
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data gagal ditambahkan";
        // menampilkan kenapa gagal
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tambah Data</h1>
    <form action="" method="POST" enctype="multipart/form-data">

        <!-- INPUT NAMA MENU -->
        <label for="nama-menu">Nama Menu <br></label>
        <input type="text" name="nama-menu" id="nama-menu" required><br><br>

        <!-- INPUT HARGA -->
        <label for="harga-menu">Harga Menu:<br></label>
        <input type="text" name="harga-menu" id="harga-menu"><br><br>

        <!-- INPUT GAMBAR -->
        <label for="gambar-menu">Gambar:<br></label>
        <input type="file" name="gambar-menu" id="gambar-menu"><br><br>

        <!-- SUBMIT BUTTON -->
        <button type="submit" value="Kirim" name="submit">Kirim</button>

    </form>
</body>

</html>