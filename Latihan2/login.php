<?php
    include "koneksi.php";
    session_start();
    if(isset($_POST['login'])){
        $user = $_POST['user'];
		$pass = $_POST['pass'];

        $cekLogin = mysqli_query($conn,"select * from tabel_login WHERE user='$user' AND pass='$pass'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekLogin);

        if($cek > 0){
            $_SESSION['username'] = $user;
			$_SESSION['password'] = $pass;
            header("Location: cekSession.php");
        }
        else{
            echo "Username dan Password Salah";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--Login-->
    <div id="artikel" class="container" style="padding-top: 90px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-dark text-center">LOGIN</h3>
                        <hr>
                    </div>

                    <div class="card-body bg-dark text-light">
                        <form method="post" action="login.php">
                            <!--Username-->
                            <div class="form-group">
                                <label class="font-weight-bold"><i class='fas fa-user'></i> Username :</label>
                                <input type="text" name="user" class="form-control" placeholder="Masukkan username" autofocus required/>
                            </div>

                            <!--Password-->
                            <div class="form-group">
                                <label class="font-weight-bold"><i class='fas fa-cog'></i> Password :</label>
                                <input type="password" name="pass" class="form-control" placeholder="Masukkan password" required/>
                            </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" name="login" class="btn btn-primary btn-success"><i class='fas fa-sign-in-alt'></i> LOGIN</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col text-center">
                <h4>Belum Punya Akun ? <a href="buatAkun.php">Buat Akun</a></h4>
            </div>
        </div>
    </div>

</body>

</html>