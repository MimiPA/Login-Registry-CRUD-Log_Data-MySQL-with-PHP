<?php
require_once("koneksi.php");
 
$id_dosen = $_GET['id_dosen'];

$query = "DELETE tabel_dosen.* , log_data.* FROM tabel_dosen, log_data WHERE tabel_dosen.id_dosen=log_data.id_dosen AND tabel_dosen.id_dosen=$id_dosen";

if(mysqli_query($conn, $query)){
    echo "<script>alert('Success !!! Data Berhasil Terhapus')</script>";
    echo "<script>window.location.href='cekSession.php';</script>";
}
else{
    die ('Hapus Data Gagal!' .mysqli_error($conn));
}
?>