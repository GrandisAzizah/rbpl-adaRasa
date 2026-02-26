<?php

require 'functions.php';
$menu = query("SELECT * FROM menu ORDER BY id_menu DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Menu</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Menu</th>
            <th>Gambar</th>
            <th>Harga</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($menu as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama_menu"]; ?></td>
                <td><img src="<?= $row["gambar_menu"]; ?>" width="100"></td>
                <td><?= $row["harga_menu"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>