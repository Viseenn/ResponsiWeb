<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="responsi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>123200129</title>
</head>
<body class="body">
    <div id="awal" class="awal">
        <div class="container mt-5">
            <div class="row pt-3">
            <?php
                if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "gagal"){
                        echo '
                        <div>
                            <div class="eror alert-danger" role="alert"> Username dan password salah, silahkan login kembali!</div>
                        </div>
                        ';
                    }else if($_GET['pesan'] == "logout"){
                        echo'
                        <div>
                            <div class="berhasil alert-success" role="alert"> Logout berhasil!</div>
                        </div>
                        ';
                    }else if($_GET['pesan'] == "belum_login"){
                        echo '
                        <div>
                            <div class="eror alert-danger" role="alert"> Anda harus login terlebih dahulu untuk mengakses halaman admin, silahkan login!</div>
                        </div>
                        ';
                    }
                }
            ?>
            <div class="col-md-6">
                <img src="login.png" alt="login" class="gambarlogin">
            </div>
            <div class="col mt-5">
                <div class="row">
                    <div class="loginawal">Login</div>
                    <form method="POST" action="ceklogin.php">
                        <!-- Username -->
                        <div class="col-md-10 up pt-5">
                            <i class="bi bi-person-fill"></i> 
                            <input type="text" autocomplete="off" placeholder="Username" aria-label="username" name="username">
                        </div>

                        <!-- Password -->
                        <div class="col-md-10 up">
                            <i class="bi bi-lock-fill"></i> 
                            <input type="password" placeholder="Password" aria-label="password" name="password">
                        </div>

                        <!-- Submit -->
                        <div class="col-md-10">
                            <button type="submit" name="pesan" value="pesan" class="button">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>