<?php
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	
	if (!isset($username)) {
        ?>
		<script>
			alert('Session Habis');
			document.location='login.php';
		</script>
		<?php
		exit;
	}
?>

<?php
    include "koneksi.php";
    $id_dosen = $_GET['id_dosen'];
    $queryEdit = mysqli_query($conn, "SELECT * FROM tabel_dosen WHERE id_dosen = $id_dosen");
    $info = mysqli_fetch_array($queryEdit);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Form Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="bg-dark text-light font-weight-bold">
        <header>
          <div class="jumbotron text-center bg-danger">
          <p class="text-right"><a href="logout.php" class="text-light text-right"><i class='fas fa-sign-in-alt'></i> Logout</a></p>
            <div class="container">
              <div class="row">
                <div class="col">
                  <h1><p class="text-light">Selamat Datang di Website Mengisi Form Pegawai</p></h1>
                </div>
              </div>
            </div>
          </div>
        </header>
    </div>

    <div class="container">
        <h2>Form Data Dosen</h2>
        <form method="post" action="update.php">
            <input type="hidden" name="id_dosen" id="id_dosen" value='<?=$id_dosen?>'/>
            <input type="hidden" name="pengedit" id="pengedit" value='<?=$_SESSION['username'];?>'/>
            <div class="form-group">
                <label>NIDN :</label>
                <input type="text" name="nidn" class="form-control" placeholder="Masukkan NIDN" value="<?=$info['nidn']?>"/>
            </div>

            <div class="form-group">
                <label>Nama :</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?=$info['nama']?>"/>
            </div>

            <div class="form-group">
                <label>Tempat Lahir :</label>
                <input type="text" name="tmpLahir" class="form-control" placeholder="Makassar" value="<?=$info['tmpLahir']?>"/>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir :</label>
                <input type="date" name="tglLahir" class="form-control" value="<?=$info['tglLahir']?>"/>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Telepon :</label>
                <input type="tel" name="telepon" pattern="^\d{4}-\d{4}-\d{4}$" class="form-control col-lg-3" placeholder="xxxx-xxxx-xxxx" value="<?=$info['telepon']?>" required/>
            </div>

            <div class="form-group">
                <label>Pendidikan Terakhir :</label>
                <select class="form-control" name="pendidikan">
                    <option value='S2' <?php if($info['pendidikan'] == "S2") echo "selected";?>>S2</option>
                    <option value='S3' <?php if ($info['pendidikan'] == "S3") echo "selected"; ?>>S3</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin :</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" name="gender" class="form-check-input" value="L" <?php if ($info['gender'] == "L") echo "checked"; ?>>Pria
                    </label>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" name="gender" class="form-check-input" value="P" <?php if ($info['gender'] == "P") echo "checked"; ?>>Wanita
                    </label>
                </div>
            </div>

            <!--Spesialisasi-->
            <div class="form-group">
                <label class="font-weight-bold">Spesialisasi :</label><br>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="skill[]" class="form-check-input" value="Programming" id="skill[]" <?php if (preg_match("/Programming/", $info['spesialisasi'])) echo "checked"; ?>>Programming
                        </label>
                    </div>
            
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="skill[]" class="form-check-input" value="Networking" id="skill[]" <?php if (preg_match("/Networking/", $info['spesialisasi'])) echo "checked"; ?>>Networking
                        </label>
                    </div>
            
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="skill[]" class="form-check-input" value="Database" id="skill[]" <?php if (preg_match("/Database/", $info['spesialisasi'])) echo "checked"; ?>>Database
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="skill[]" class="form-check-input" value="Analyst" id="skill[]" <?php if (preg_match("/Analyst/", $info['spesialisasi'])) echo "checked"; ?>>Analyst
                        </label>
                    </div>
            </div>

            <!--Username-->
            <div class="form-group">
                <label class="font-weight-bold">Username :</label>
                <div class="input-group-append">
                    <input type="email" class="form-control" name="username" placeholder="Masukkan Email" value="<?=$info['username']?>" required/>
                    <span class="input-group-text">@example.com</span>
                </div>
            </div>

            <div class="form-group">
                <label>Password  :</label>
                <input type="password" name="password" class="form-control" placeholder="********" value="<?=$info['pass']?>"/>
            </div>

            <!--Golongan-->
            <div class="form-group">
                <label>Golongan :</label>
                <select class="form-control" name="golongan">
                    <option value='3A' <?php if($info['golongan'] == "3A") echo "selected";?>>3A</option>
                    <option value='3B' <?php if($info['golongan'] == "3B") echo "selected";?>>3B</option>
                    <option value='3C' <?php if($info['golongan'] == "3C") echo "selected";?>>3C</option>
                    <option value='4A' <?php if($info['golongan'] == "4A") echo "selected";?>>4A</option>
                    <option value='4B' <?php if($info['golongan'] == "4B") echo "selected";?>>4B</option>
                    <option value='4C' <?php if($info['golongan'] == "4C") echo "selected";?>>4C</option>
                </select>
            </div>

            <!--Pangkat-->
            <div class="form-group">
                <label>Golongan :</label>
                <select class="form-control" name="pangkat">
                    <option value='AA' <?php if($info['pangkat'] == "AA") echo "selected";?>>AA</option>
                    <option value='L' <?php if($info['pangkat'] == "L") echo "selected";?>>L</option>
                    <option value='LK' <?php if($info['pangkat'] == "LK") echo "selected";?>>LK</option>
                    <option value='GB' <?php if($info['pangkat'] == "GB") echo "selected";?>>GB</option>
                </select>
            </div>

            <div class="form-group">
                <label>Pengalaman Kerja :</label>
                <textarea class="form-control" rows="5" style="resize: none" id="pengalaman" name="pengalaman"><?=$info['pengalaman']?></textarea>
            </div>


            <div class="form-group">
                <label>Gaji Pokok :</label>
                <input type="text" name="gajiPokok" class="form-control" placeholder="1000000" value="<?=$info['gajiPokok']?>"/>
                <input type="hidden" name="total_gaji_lama" class="form-control" value="<?=$info['total_gaji']?>"/>
            </div>

            <button type="submit" class="btn btn-primary"><i class='far fa-edit'></i> Edit</button>
            <button type="reset" class="btn btn-danger"><i class='fas fa-redo-alt'></i> Reset</button>
        </form>
    </div>
    <hr>

    <div id="dashboard" style="padding-top:30px;padding-bottom:0px">
        <footer>
          <div class="footer text-center bg-info">
            <div class="container">
              <div class="row">
                <div class="col">
                  <h1><p class="text-light">Terima Kasih Telah Mengisi Form Pegawai Ini</p></h1>
                  <div class="lead"><p class="text-warning font-weight-bold">Paramita Aditung</p></div>
                </div>
              </div>
            </div>
          </div>
    </footer>
    </div>
</body>

</html>