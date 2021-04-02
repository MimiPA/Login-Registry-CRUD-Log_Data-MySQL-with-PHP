<?php
include "koneksi.php";

date_default_timezone_set('Asia/Makassar');
$tanggal = date("Y-m-d H:i:sa");

$id_dosen = $_POST['id_dosen'];
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

$total_gaji_lama = $_POST['total_gaji_lama'];
$pengedit = $_POST['pengedit'];


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

$queryGaji = mysqli_query($conn, "INSERT INTO log_data (id_dosen, total_gaji_lama, total_gaji_baru, waktu, pengedit) VALUES ('$id_dosen', '$total_gaji_lama', '$total_gaji', '$tanggal', '$pengedit')");


$mysqli = "UPDATE tabel_dosen SET nidn='$nidn', nama='$nama', tmpLahir='$tmpLahir', tglLahir='$tglLahir', telepon='$telepon', pendidikan='$pendidikan', gender='$gender', spesialisasi='$skill', username='$username', pass='$password', golongan='$golongan', pangkat='$pangkat', pengalaman='$pengalaman', gajiPokok='$gajiPokok', total_gaji='$total_gaji' WHERE id_dosen='$id_dosen'";
$result = mysqli_query($conn, $mysqli);

if ($result) {
  echo "<script>alert('Berhasil Edit Data')</script>";
  echo "<script>window.location.href='cekSession.php';</script>";
}
else {
  die ('Edit Gagal!' .mysqli_error($conn));
}

mysqli_close($conn);

?>