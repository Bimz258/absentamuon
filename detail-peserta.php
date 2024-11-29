<?php 
    session_start();
    include 'koneksi.php';

    if ($_SESSION['stat_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    // Gunakan $_GET['id'] untuk mencari berdasarkan id_pendaftaran
    $id_pendaftaran = mysqli_real_escape_string($conn, $_GET['id']);
    $peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'");

    // Periksa apakah ada hasil dari kueri
    if ($peserta && mysqli_num_rows($peserta) > 0) {
        $p = mysqli_fetch_object($peserta);
    } else {
        // Tidak ada hasil ditemukan, mungkin berikan pesan atau redirect ke halaman lain
        echo '<script>alert("Data peserta tidak ditemukan"); window.location="data-peserta.php";</script>';
        exit(); // Hentikan eksekusi script agar tidak melanjutkan ke bagian selanjutnya
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB Online RA Alkhoeriyah | Administrator</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Bagian Header -->
    <header>
        <h1><a href="beranda.php">Admin PSB</a></h1>
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="data-peserta.php">Data Peserta</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </header>

    <!-- Bagian Content -->
    <section class="content">
        <h2>Detail Peserta</h2>
        <div class="box">
            <table class="table-form" border="0">
                <tr>
                    <td>Id</td>
                    <td>:</td>
                    <td><?php echo $p->id_pendaftaran; ?></td>
                </tr>

                <!-- Menampilkan data dalam elemen HTML -->
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $p->nm_peserta; ?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><?php echo $p->tmp_lahir; ?></td>
                </tr>
                <tr>
                    <td>uraian</td>
                    <td>:</td>
                    <td><?php echo $p->uraian; ?></td>
                </tr>
                <!-- Tambahkan baris-tr lainnya sesuai kebutuhan -->
                <!-- ... -->
            </table>
        </div>
    </section>

</body>
</html>
