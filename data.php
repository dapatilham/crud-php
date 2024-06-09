<?php
include 'createdb.php';
require 'functions.php';

$show = query_getData("SELECT * FROM servicean");

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="style.css">
 <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Data Servicean</title>
    <style>
    body,html {
        background-image: url("bg.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        color: white;
    }
    </style>
    <script>
        document.getElementById("title_hover").innerHTML="Test";
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Beranda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#option" aria-controls="option"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="option">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="data.php">Daftar Servicean<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="height: 100%;" align="center">
    <table border="0" align="center" cellpadding="10" cellspacing="0"> 
             <thead style="height: 5%" align="center">
                <tr style="height: 10%">
                    <td>
                        <br>
                        <h2 style="font-family: 'Lucida Sans'">Data servicean</h2>
                    </td>
                </tr>
            </thead>

        <tbody>
            <td style="width: 97%">
                <table class="table table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>LANGKAH</th>
                            <th>SN/IMEI</th>
                            <th>TYPE</th>
                            <th>EMAIL</th>
                            <th>LAYANAN</th>
                            <th>STATUS</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php if (!$show) 
                            echo "<tr>
                            <td colspan='9' align='center'>Data Masih Kosong...</td></tr>";?>
                        <?php foreach($show as $row): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><a href="ubah.php?id=<?= $row["idServicean"]; ?>" class="btn btn-outline-warning" role="button" aria-pressed="active">ubah</a>  
                                <a href="hapus.php?id=<?= $row["idServicean"]; ?>" class="btn btn-outline-danger" role="button" aria-pressed="active">hapus</a></td>
                            <td><?= $row["sn"] ?></td>
                            <td><?= $row["nama"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["layanan"] ?></td>
                            <td><?= $row["status"] ?></td>
                            <td><?= $row["keterangan"] ?></td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </td>
        </tbody>

        <tfoot align="center">
            <td style="font-family: 'Courier New', Courier, monospace; font-size: 10pt">@gawaicare 2024</td>
        </tfoot>
    </table>
  </div>
</body>

</html>
