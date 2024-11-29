<?php 
    include 'koneksi.php';

    if(isset($_POST['submit'])){

      // ambil 1 id terbesar di kolom id_pendaftaran, lalu ambil 5 karakter aja dari sebelah kanan
      $getMaxid = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");

        $d = mysqli_fetch_object($getMaxid);
        $generateid = 'P'.date('Y').sprintf("%05s", $d->id + 1);
        

        // Proses Insert
        $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES(
            '".$generateid."',
            '".date( 'y-m-d' )."',
            '".$_POST["nm"]."',
            '".$_POST["tmp_lahir"]."',
            '".$_POST["uraian"]."'
        )");
        if($insert){
            echo '<script>window.location="berhasil.php?id='.$generateid.'"</script>';
        }else{
            echo 'gagal'.mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamu Radio Intan Garut</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- bagian box formulir -->
    <section class="box-formulir">

    <h2>Formulir Pendaftaran Tamu Radio Intan</h2>

    <!-- Bagian Form -->
    <form action="" method="post">

    <h3>Data Diri Tamu</h3>
    
    <div class="box">
        <table border="0" class="table-form">
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>
                    <input type="date" name="tgl_lahir" class="input-control">
                </td>
            </tr>
            <tr>
                <td>Nama Tamu</td>
                <td>:</td>
                <td>
                    <input type="text" name="nm" class="input-control">
                </td>
            </tr>
            <tr>
                <td>Asal Tamu</td>
                <td>:</td>
                <td>
                    <input type="text" name="tmp_lahir" class="input-control">
                </td>
            </tr>
            <tr>
                <td>Uraian</td>
                <td>:</td>
                <td>
                    <textarea class="input-control" name="uraian"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                   <input type="submit" name="submit" class="btn-daftar" value="Daftar Sekarang">
                </td>
            </tr>
        </table>
    </div>
 
    </form>
    <form action="login.php">
    <input type="submit" class="btn-daftar" value="Login" />
</form>
    </section>


</body>
</html>