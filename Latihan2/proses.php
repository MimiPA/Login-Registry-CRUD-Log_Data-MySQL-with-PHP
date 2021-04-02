<?php
include "koneksi.php";

date_default_timezone_set('Asia/Makassar');
$tanggal = date("Y-m-d H:i:sa");

$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$tmpLahir = $_POST['tmpLahir'];
$tglLahir = $_POST['tglLahir'];
$telepon = $_POST['telepon'];
$pendidikan = $_POST['pendidikan'];
$gender = $_POST['gender'];

$skill ='';
foreach($_POST['skill'] as $keahlian){
  $skill .= $keahlian . ', ';
}

$skill = substr($skill, 0, -2);

$username = $_POST['username'];
$password = $_POST['password'];
$golongan = $_POST['golongan'];
$pangkat = $_POST['pangkat'];
$pengalaman = $_POST['pengalaman'];
$gajiPokok = $_POST['gajiPokok'];


if($golongan == '3A' || $golongan == '3B'){
  $total_gaji = $gajiPokok + 500000;
}
else if($golongan == '3C'){
  $total_gaji = $gajiPokok + 750000;
}
else if($golongan == '4A' || $golongan == '4B'){
  $total_gaji = $gajiPokok + 1000000;
}
else if($golongan == '4C'){
  $total_gaji = $gajiPokok + 1500000;
}

if($pangkat == 'AA'){
  $total_gaji += 375000;
}
else if($pangkat == 'L'){
  $total_gaji += 750000;
}
else if($pangkat == 'LK'){
  $total_gaji += 1500000;
}
else if($pangkat == 'GB'){
  $total_gaji += 7500000;
}

$queryGaji = mysqli_query($conn, "SELECT * FROM tabel_dosen WHERE id_dosen = $id_dosen");



$mysqli = "INSERT INTO tabel_dosen (nidn, nama, tmpLahir, tglLahir, telepon, pendidikan, gender, spesialisasi, username, pass, golongan, pangkat, pengalaman, gajiPokok, total_gaji) VALUES ('$nidn', '$nama', '$tmpLahir', '$tglLahir', '$telepon', '$pendidikan', '$gender', '$skill', '$username', '$password', '$golongan', '$pangkat', '$pengalaman', '$gajiPokok', '$total_gaji')";
$result = mysqli_query($conn, $mysqli);

if ($result) {
  echo "<script>alert('Inputan Berhasil pada tanggal $tanggal. Terima Kasih')</script>";
  echo "<script>window.location.href='cekSession.php';</script>";
}
else {
  die ('Input Gagal!' .mysqli_error($conn));
}

mysqli_close($conn);

?>