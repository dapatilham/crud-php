<?php
require 'functions.php';

$id = $_GET["id"];

$servicean = query_getData("SELECT * FROM servicean WHERE idServicean = $id");
if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah! ☺');
        document.location.href='data.php';
        </script>";
    }else {
        echo "<script>
        alert('Data Gagal Diubah!');
        </script>";
        var_dump($connect);
    }
}
if (isset($_POST["batal"])) {
    header("Location: data.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Ubah</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <style>
    body,html {
        background-image: url("bghome.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        color: white;
        height: 100%;
        margin: 0;
    }
    </style>
</head>

<body>
    <div class="container" style="height: 100%;" align="center">
        <table border="0" style="width: 50%;">
            <thead style="height: 5%" align="center">
                <tr style="height: 10%">
                    <td>
                        <h2 style="font-family: 'Lucida Sans'">Ubah data</h2>
                    </td>
                </tr>
            </thead>
            <tbody align="center">
                <tr style="height: 70%">
                    <td>
                        <form method="post" action="" align="left" style="width: 80%; padding: 20px; border: 0px solid #f1f1f1; background-color: rgba(0, 0, 51, 0.2);">
                            <input class="form-control" type="hidden" name="id" value="<?= $servicean[0]["idServicean"] ?>">
                            <div class="form-group">
                                <input type="number" class="form-control" id="sn" name="sn" placeholder="Masukan SN/IMEI" required 
                                value="<?= $servicean[0]["sn"] ?>">
                                <small id="snHelp" class="form-text">Masukan serial number/IMEI gawai</small>
                            </div>
                            <div class="form-group">
                                <input type="namespace" class="form-control" id="nama" name="nama" placeholder="Nama/type gawai" required
                                value="<?= $servicean[0]["nama"] ?>">
                                <small id="nameHelp" class="form-text">Masukan nama dan type gawai</small>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="<?= $servicean[0]["email"] ?>">
                                <small id="emailHelp" class="form-text">Masukan email user</small>
                            </div>
                            <div class="form-group">
                                <select id="layanan" class="form-control" name="layanan" required value="<?= $servicean[0]["layanan"] ?>">
                                    <option>Layanan</option>
                                    <option value="M" <?php if($servicean[0]["layanan"]=="M"){echo "selected";}?>>Maintenance</option>
                                    <option value="BD" <?php if($servicean[0]["layanan"]=="BD"){echo "selected";}?>>Backup Data</option>
                                    <option value="RD" <?php if($servicean[0]["layanan"]=="RD"){echo "selected";}?>>Recovery Data</option>
                                    <option value="IS" <?php if($servicean[0]["layanan"]=="IS"){echo "selected";}?>>Install Software</option>
                                </select>
                                <small id="LayananHelp" class="form-text">Pilih layanan</small>
                            </div>
                            <div class="form-group">
                                <select id="status" class="form-control" name="status" required value="<?= $servicean[0]["status"] ?>">
                                    <option>Status</option>
                                    <option value="S" <?php if($servicean[0]["status"]=="S"){echo "selected";}?>>On Service</option>
                                    <option value="R" <?php if($servicean[0]["status"]=="R"){echo "selected";}?>>Running</option>
                                    <option value="P" <?php if($servicean[0]["status"]=="P"){echo "selected";}?>>Pending</option>
                                </select>
                                <small id="StatusHelp" class="form-text">Pilih status</small>
                            </div>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" required
                            value="<?= $servicean[0]["keterangan"] ?>">
                            <small id="keteranganHelp" class="form-text">Masukan keterangan</small>
                            <br />
                            </div>
                            <div align="right">
                                <button type="submit" class="btn btn-dark" name="batal">Batalkan</button>
                                <button type="submit" class="btn btn-dark" name="submit">Ubah Data</button>
                            </div>
                        </form>
                    </td>
                </tr>
            <tr>
                <td></td>
            </tr>
            </tbody>
            <tfoot style="height: 5%;" align="center">
                <tr>
                    <td style="font-family: 'Courier New', Courier, monospace; font-size: 8pt; padding-top: 10px">Trilogi 2024</td>
                </tr>
            </tfoot>
        </table>
    </div>
 </body>

</html>
