<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['stat_login'] != true ){
        echo '<script>window.location="login.php"</script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Online Radio Intan | Administrator</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Bagian Header -->
    <header>
        <h1><a href="beranda.php">Buku Tamu</a></h1>
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="data-peserta.php">Data Peserta</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </header>

    <!-- bagian content -->
    <section class="content">
        <h2>Beranda</h2>
        <div class="box">
            <h3>RadioIntan, Selamat Datang di Buku Tamu Online</h3>

        </div>
    </section>

</body>
</html>