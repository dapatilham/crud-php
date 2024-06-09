<?php
error_reporting (E_ALL ^ E_NOTICE);
require 'createdb.php';

$connect = mysqli_connect($host, $user, $pass, $dbName);

function query($query) {
    global $connect;
    $jadi = mysqli_query($connect, $query);
    return $jadi;
}

function query_getData($query){
    global $connect;
    $select = mysqli_query($connect, $query); //select * data
    $view = [];
    while ( $row = mysqli_fetch_assoc($select)) {
        $view[] = $row;
    }
    return $view; 
}

function tambah($data){
    global $connect;
    $sn = $data["sn"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $layanan = $data["layanan"];
    $status = $data["status"];
    $keterangan = htmlspecialchars($data["keterangan"]);

    $snCheck = query("SELECT sn FROM servicean WHERE sn = '$sn'");
    if (mysqli_fetch_assoc($snCheck)) {
        echo "<script>
            alert('SN sudah ada!');
            </script>";
            return false;
    }

    mysqli_query($connect,"INSERT INTO servicean VALUES
        ('', '$sn', '$nama', '$email', '$layanan', '$status','$keterangan')");

    return mysqli_affected_rows($connect);
}

function update($data){
    global $connect;

    $id = $data["id"];
    $sn = $data["sn"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $layanan = $data["layanan"];
    $status = $data["status"];
    $keterangan = htmlspecialchars($data["keterangan"]);

    mysqli_query($connect, "UPDATE servicean SET sn ='$sn',
            nama = '$nama', email = '$email', layanan = '$layanan',
            status = '$status', keterangan = '$keterangan' WHERE idServicean = $id");
    
    return mysqli_affected_rows($connect);
}

function delete($data){
    global $connect;
    $id = $data;
    mysqli_query($connect,"DELETE FROM servicean WHERE idServicean = $data");
    return mysqli_affected_rows($connect);
}
?>
