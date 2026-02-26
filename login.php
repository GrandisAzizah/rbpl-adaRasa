<?php
session_start();

require 'functions.php';

// cek apakah ada cookie
if (isset($_COOKIE['k']) && isset($_COOKIE['x'])) {
    $a = $_COOKIE['k'];
    $x = $_COOKIE['x'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE a = $a");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($x === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

// cek apakah sudah login ga usah balik ke login
if (isset($_SESSION["login"])) {
    if ($_SESSION['role'] == 'admin') {
        header("location:admin/berandaAdmin.php");
    } else if ($_SESSION['role'] == 'tim dapur') {
        header("location:dapur/pesananDapurDiterima.php");
    } else if ($_SESSION['role'] == 'tim pengantaran') {
        header("location:pengantaranDtterima.php");
    }
}

// cek apakah tombol login sudah diklik
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user 
    WHERE username = '$username'");

    //echo "username input: " . $username . "<br>";
    //echo "rows found: " . mysqli_num_rows($result) . "<br>";
    //die();

    // cek apakah username ada di database
    // menghitung ada berapa baris dari fungsi select
    // jika ada maka bernilai 1, jika tidak ada maka 0
    if (mysqli_num_rows($result) === 1) {
        //$row = mysqli_fetch_assoc($result);
        //echo "username db: " . $row['username'] . "<br>";
        //echo "role: " . $row['role'] . "<br>";
        //echo "password verify: " . (password_verify($password, $row["password"]) ? 'true' : 'false') . "<br>";
        //die();
        // cek password
        $row = mysqli_fetch_assoc($result); // dalam row akan sudah ada datanya
        if ($username === $row["username"]) {
            // cek string sama atau tidak dengan hash nya
            if (password_verify($password, $row["password"])) {
                // set session
                $_SESSION["login"] = true;
                $_SESSION['role'] = $row['role'];

                if ($row['role'] == 'admin') {
                    header("location:berandaAdmin.php");
                } else if ($row['role'] == 'tim dapur') {
                    header("location:pesananDapurDiterima.php");
                } else if ($row['role'] == 'tim pengantaran') {
                    header("location:pengantaranDiterima.php");
                }
                exit;

                // cek cookies remember me
                if (isset($_POST['remember'])) {
                    // buat cookie
                    // k itu id 
                    // x itu username, username akan di enkripsi
                    // enkripsi hash (parameter 1, parameter 2, parameter 3 - opsional)
                    // parameter 1 -> pake algoritma apa
                    // parameter 2 -> string mana yang mau di enkripsi
                    setcookie('k', $row['a'], time() + 60 * 60);
                    setcookie('x', hash('sha256', $row['username']), time() + 60 * 60);
                }
            }
        }
    }
    // jika salah maka dia error
    $error = true;
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
</style>

<body>
    <div class="container">
        <form action="" method="POST">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <button type="submit" value="login" class="btn btn-dark" name="login">Login</button>
        </form>
    </div>
</body>

</html>