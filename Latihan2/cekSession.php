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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form Pegawai</title>
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
          <p class="text-right"><a href="logout.php" class="text-light text-right"><i class='fas fa-sign-out-alt'></i> Logout</a></p>
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
        <form method="post" action="proses.php">
            <div class="form-group">
                <label>NIDN :</label>
                <input type="text" name="nidn" class="form-control" placeholder="Masukkan NIDN" required/>
            </div>

            <div class="form-group">
                <label>Nama :</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required/>
            </div>

            <div class="form-group">
                <label>Tempat Lahir :</label>
                <input type="text" name="tmpLahir" class="form-control" placeholder="Makassar" required/>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir :</label>
                <input type="date" name="tglLahir" class="form-control" required/>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Telepon :</label>
                <input type="tel" name="telepon" pattern="^\d{4}-\d{4}-\d{4}$" class="form-control col-lg-3" placeholder="xxxx-xxxx-xxxx" required/>
            </div>

            <div class="form-group">
                <label>Pendidikan Terakhir :</label>
                <select class="form-control" name="pendidikan">
                    <option>S2</option>
                    <option>S3</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin :</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" name="gender" class="form-check-input" value="L">Pria
                    </label>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" name="gender" class="form-check-input" value="P">Wanita
                    </label>
                </div>
            </div>

            <!--Spesialisasi-->
            <div class="form-group">
                <label class="font-weight-bold">Spesialisasi :</label><br>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="skill[]" class="form-check-input" value="Programming" id="skill[]">Programming
                        </label>
                    </div>
            
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="skill[]" class="form-check-input" value="Networking" id="skill[]">Networking
                        </label>
                    </div>
            
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="skill[]" class="form-check-input" value="Database" id="skill[]">Database
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="skill[]" class="form-check-input" value="Analyst" id="skill[]">Analyst
                        </label>
                    </div>
            </div>

            <!--Username-->
            <div class="form-group">
                <label class="font-weight-bold">Username :</label>
                <div class="input-group-append">
                    <input type="email" class="form-control" name="username" placeholder="Masukkan Email" required/>
                    <span class="input-group-text">@example.com</span>
                </div>
            </div>

            <div class="form-group">
                <label>Password  :</label>
                <input type="password" name="password" class="form-control" placeholder="********" required/>
            </div>

            <!--Golongan-->
            <div class="form-group">
                <label>Golongan :</label>
                <select class="form-control" name="golongan">
                    <option>3A</option>
                    <option>3B</option>
                    <option>3C</option>
                    <option>4A</option>
                    <option>4B</option>
                    <option>4C</option>
                </select>
            </div>

            <!--Pangkat-->
            <div class="form-group">
                <label>Golongan :</label>
                <select class="form-control" name="pangkat">
                    <option>AA</option>
                    <option>L</option>
                    <option>LK</option>
                    <option>GB</option>
                </select>
            </div>

            <div class="form-group">
                <label>Pengalaman Kerja :</label>
                <textarea class="form-control" name="pengalaman" rows="5" placeholder="Pengalaman"></textarea>
            </div>


            <div class="form-group">
                <label>Gaji Pokok :</label>
                <input type="text" name="gajiPokok" class="form-control" placeholder="1000000" required/>
            </div>

            <button type="submit" class="btn btn-success"><i class='fas fa-download'></i> Submit</button>
            <button type="reset" class="btn btn-warning"><i class='fas fa-cut'></i> Reset</button>
        </form>
    </div>
    <hr color="yellow">

    <!--Tabel List Dosen-->
    <div id="listDosen" class="container-fluid table-responsive">
    <h3>Tabel Data Dosen</h3>
        <table class="table table-bordered table-hover table-light">
            <thead class="thead-light">
                <tr>
                    <th>ID_Dosen</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Telepon</th>
                    <th>Pendidikan</th>
                    <th>Jenis Kelamin</th>
                    <th>Spesialisasi</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Golongan</th>
                    <th>Pangkat</th>
                    <th>Pengalaman</th>
                    <th>Gaji Pokok</th>
                    <th>Total Gaji</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $data = mysqli_query($conn,"select * from tabel_dosen");
		            while($d = mysqli_fetch_array($data)){
			    ?>
                <tr>
                    <td><?php echo $d['id_dosen']; ?></td>
                    <td><?php echo $d['nidn']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['tmpLahir']; ?></td>
                    <td><?php echo $d['tglLahir']; ?></td>
                    <td><?php echo $d['telepon']; ?></td>
                    <td><?php echo $d['pendidikan']; ?></td>
                    <td><?php echo $d['gender']; ?></td>
                    <td><?php echo $d['spesialisasi']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['pass']; ?></td>
                    <td><?php echo $d['golongan']; ?></td>
                    <td><?php echo $d['pangkat']; ?></td>
                    <td><?php echo $d['pengalaman']; ?></td>
                    <td><?php echo $d['gajiPokok']; ?></td>
                    <td><?php echo $d['total_gaji']; ?></td>
                    <td><a href="edit.php?id_dosen=<?php echo $d['id_dosen']; ?>">Edit</a></td>
                    <td><a href="hapus.php?id_dosen=<?php echo $d['id_dosen']; ?>">Hapus</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!--End of List Dosen-->
    <hr color="pink">

    <br>
    <!--Tabel Log Perubahan Data-->
    <div id="listPerubahan" class="container-fluid table-responsive">
    <h3>Tabel Log Perubahan Data</h3>
        <table class="table table-bordered table-hover table-light">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>ID_Dosen</th>
                    <th>Total Gaji Lama</th>
                    <th>Total Gaji Baru</th>
                    <th>Waktu Perubahan</th>
                    <th>Username Pengedit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $data = mysqli_query($conn,"select * from log_data");
		            while($d = mysqli_fetch_array($data)){
			    ?>
                <tr>
                    <td><?php echo $d['id_log']; ?></td>
                    <td><?php echo $d['id_dosen']; ?></td>
                    <td><?php echo $d['total_gaji_lama']; ?></td>
                    <td><?php echo $d['total_gaji_baru']; ?></td>
                    <td><?php echo $d['waktu']; ?></td>
                    <td><?php echo $d['pengedit']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!--End of List Perubahan Data-->
    <hr color="white">

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