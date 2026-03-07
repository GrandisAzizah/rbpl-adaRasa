<?php

require '../functions.php';
$menu = query("SELECT * FROM menu ORDER BY id_menu DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-main">
        <div class="header-nav mt-3">
            <a href="berandaAdmin.php" class="header-nav-left">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.6667 19H6.33337M6.33337 19L15.8334 9.5M6.33337 19L15.8334 28.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <h5 class="header-nav-title" style="margin: 0;">Menu</h5>
            <a href="inputMenu.php" class="header-nav-right">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.91669 18.9998H30.0834M19 7.9165V30.0832" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div class="container-menu mt-4">
            <div class="card">
                <div class="row g-0">
                    <!-- Gambar -->
                    <div class="col-auto">
                        <img src="../rbpl-nasi-kuning.png" class="menu-img" alt="...">
                    </div>
                    <!-- Isi -->
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title">Nasi Kuning</h5>
                            <p class="card-text">Rp. 15.000</p>
                        </div>
                    </div>
                    <!-- Tombol Edit dan Hapus -->
                    <button>Edit</button>
                    <button>Hapus</button>
                </div>
            </div>
        </div>
</body>

</html>