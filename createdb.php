<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "gawaicare";

    $konek = mysqli_connect($host,$user,$pass); //koneksi ke sqlnya
    if (!$konek) {
        die("gagal koneksi...");
    }

    $pilihDB = mysqli_select_db($konek,$dbName); //pilih database
    if (!$pilihDB) {
        $pilihDB = mysqli_query($konek,"CREATE DATABASE $dbName"); //buat database
        if (!$pilihDB) {
            die("gagal buat database...");
        }else {
            $pilihDB = mysqli_select_db($konek,$dbName); //pilih database
            if (!$pilihDB) {
                die("gagal koneksi ke database...");
            }
        }
    }

    $sqlTabelServicean = "create table if not exists servicean (
                            idServicean int auto_increment not null primary key,
                            sn char(9) not null,
                            nama varchar(30) not null,
                            email varchar(30),
                            layanan enum ('M','BD','RD','IS') not null,
                            status enum ('S','R','P') not null,
                            keterangan varchar(30) not null,
                            KEY(sn))";
    mysqli_query($konek,$sqlTabelServicean) or die("gagal buat tabel Servicean"); //membuat tabel servicean
?>