<?php
session_start();
require 'functions.php';

if (isset($_POST["gantiPassword"])) {
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT password FROM 
    user WHERE password = '$password'");

    // cek email ada di database apa enggak
    if (!mysqli_fetch_assoc($result)) {
        return false; // agar insert tidak terjadi
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Login Ada Rasa</title>
</head>

<style>
    body {
        font-family: 'Aleo', serif;
        background-color: #ffffff;
        margin: 0;
        padding: 20px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        max-width: 250px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
        outline: black solid 1px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    button {
        width: 100%;
        padding: 4px !important;
    }

    input {
        width: 100%;
        padding: 4px;
        margin-top: 5px;
        border: 1px solid #B3B3B3;
        border-radius: 4px;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 0px;
    }

    .menu-item .icon {
        flex-shrink: 0;
        width: 24px;
    }
</style>

<body>
    <div>
        <div class="menu-item">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                <g clip-path="url(#clip0_78_992)">
                    <path d="M19.825 25L25.425 30.6L24 32L16 24L24 16L25.425 17.4L19.825 23H32V25H19.825Z" fill="#1D1B20" />
                </g>
                <defs>
                    <clipPath id="clip0_78_992">
                        <rect x="4" y="4" width="40" height="40" rx="20" fill="white" />
                    </clipPath>
                </defs>
            </svg>

            <h5 class="text-center">Ganti Password</h5>
        </div>

        <div class="container">
            <form action="" method="POST">

                <label for="password">Password Lama</label><br>
                <input type="password" id="password" name="password" required><br>

                <label for="password">Password Baru</label><br>
                <input type="password" id="password" name="password" required><br>

                <button type="submit" class="btn btn-dark mt-3" name="gantiPassword">Save</button>
            </form>
        </div>
    </div>
</body>

</html>