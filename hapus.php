<?php
require 'functions.php';

$id = $_GET["id"];
if ($uu = delete($id) > 0) {
    echo "<script>
        alert('Data berhasil dihapus! ☺');
        document.location.href= 'data.php';
        </script>";
}else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href= 'data.php';
        </script>";
}
        //document.location.href= 'data.php';
?>
