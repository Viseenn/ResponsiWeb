<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("location:login.php?pesan=belum_login");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="responsi.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <style>
        @font-face{
            font-family : 'Cooper';
            src: url('Cooper/Cooper.ttf');
        }
        .datang{
            font-family: 'Cooper';
            background-color: #16174f;
            padding-bottom: 1px;
            padding-top: 2px;
        }
        .h1{
            color: white;
            padding-top: 2px;
            text-align : center;
        }
    </style>

    <title>123200129</title>
  </head>
  <body>
    <div class="datang">
        <div class="h1"> DAFTAR INVENTARIS BARANG <br> KANTOR SERBA ADA </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link ms-auto" aria-current="page" href="home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="outputinventaris.php">Daftar Inventaris</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item dropdown" style="font-family: 'Lato', sans-serif;">
                            <button class="dropbtn"> List per Kategori </button>
                            <div class="dropdown-content">
                                <a class="dropdown-item" href="outputinventaris.php?kategori=bangunan">Bangunan</a>
                                <a class="dropdown-item" href="outputinventaris.php?kategori=kendaraan">Kendaraan</a>
                                <a class="dropdown-item" href="outputinventaris.php?kategori=alattulis">Alat Tulis
                                    Kantor</a>
                                <a class="dropdown-item" href="outputinventaris.php?kategori=elektronik">Elektronik</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="keluar">
                <a type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="logout"> Logout</a>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Apakah Anda yakin ingin logout?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
                </div>
            </div>
        </div>
    </div>

    <?php
        include ('connect.php');

        $kode_barang = $_GET["kode_barang"];
        $sql = "SELECT * FROM inventaris WHERE kode_barang='$kode_barang'";
        $hasil = $conn->query($sql);
        $data = $hasil->fetch_assoc();
    ?>
    <div class="tambahform">
    <div class="hapus" style="padding-top: 50px;">
        <h6> Hapus Data Inventaris </h6>
    </div>
    <div class="modal-c" style="font-family: 'Open Sans', sans-serif; padding: 8px 0px 0px 10px;">
       <p> Yakin Ingin Menghapus <span style="color:#1818ff;"><?php echo $data['nama_barang'] ?></span> ?</p>
    </div>
    <div class="modal-f">
        <a href="delete.php?kode_barang=<?= $data['kode_barang']?>"><button type="button" class="buttonn">Hapus</button></a>
        <a href="outputinventaris.php"><button type="button" class="buttonn1" data-bs-dismiss="modal">Batal</button></a>
    </div>
    </div>

    <!-- footer -->
    <footer class="footer" style="margin-top: 230px;">
        <p class="text-center fw-bold"> Inventaris 2016 </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
  </body>
</html>