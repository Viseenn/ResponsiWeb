<?php
  include("connect.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Cooper';
            src: url('Cooper/Cooper.ttf');
        }

        .datang {
            font-family: 'Cooper';
            background-color: #16174f;
            padding-bottom: 1px;
            padding-top: 2px;
        }

        .h1 {
            color: white;
            padding-top: 2px;
            text-align: center;
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

    <div class="tambahform">
    <div class="tambahi" style="padding-top: 30px;">
        <h6> Tambah Data Inventaris </h6>
    </div>
    <form method="POST" action="tambah1.php">
    <!-- Kode barang -->
    <div class="row pt-3">
        <div class="col-md-3 ps-4 pb-3" style="font-family: 'Open Sans', sans-serif;">
            <label for="kode_barang" class="col-form-label" >Kode Barang</label>
        </div>
        <div class="col-md-7">
            <input type="text" autocomplete="off" name="kode_barang" class="padding" ariadescribedby="kode_barang" placeholder="Kode Barang" style="padding: 3px 5px 3px 10px;" > 
        </div>
    </div>

    <!-- Nama barang -->
    <div class="row">
        <div class="col-md-3 ps-4 pb-3" style="font-family: 'Open Sans', sans-serif;">
            <label for="nama_barang" class="col-form-label">Nama Barang</label>
        </div>
        <div class="col-md-7">
            <input type="text" autocomplete="off" name="nama_barang" class="padding" ariadescribedby="nama_barang" placeholder="Nama Barang" style="padding: 3px 5px 3px 10px;" >
        </div>
    </div>

    <!-- Jumlah barang -->
    <div class="row">
        <div class="col-md-3 ps-4 pb-3" style="font-family: 'Open Sans', sans-serif;">
            <label for="jumlah" class="col-form-label">Jumlah</label>
        </div>
        <div class="col-md-4">
            <input type="text" autocomplete="off" name="jumlah" class="jumsat" style="padding: 3px 5px 3px 10px;"  ariadescribedby="jumlah" placeholder="Jumlah">
        </div>
    </div>

    <!-- Satuan -->
    <div class="row">
        <div class="col-md-3 ps-4 pb-3" style="font-family: 'Open Sans', sans-serif;">
            <label for="satuan" class="col-form-label">Satuan</label>
        </div>
        <div class="col-md-4">
            <input type="text" autocomplete="off" name="satuan" class="jumsat" style="padding: 3px 5px 3px 10px;"  ariadescribedby="satuan" placeholder="Satuan">
        </div>
    </div>

    <!-- Tanggal Datang -->
    <div class="row">
        <div class="col-md-3 ps-4 pb-3" style="font-family: 'Open Sans', sans-serif;">
            <label for="tgl_datang" class="col-form-label">Tanggal Datang</label>
        </div>
        <div class="col-md-7">
            <input type="date" name="tgl_datang" class="" ariadescribedby="tgl_datang" style="padding: 3px 5px 3px 10px;">
        </div>
    </div>

    <!-- Kategori -->
    <div class="row">
        <div class="col-md-3 pt-1 ps-4 pb-2" style="font-family: 'Open Sans', sans-serif;">
            <label for="exampleFormControlTextarea1" class="formlabel">Kategori</label>
        </div>
        <div class="col-auto">
            <select name="kategori" aria-label="Default select example" style="width:119%; padding: 3px 5px 3px 10px;">
            <option selected>Bangunan</option>
            <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Kendaraan">Kendaraan</option>
            </select>
        </div>
    </div>


    <!-- Status -->
    <div class="row">
        <div class="d-block" style="font-family: 'Open Sans', sans-serif;">
            <label for="disabledTextInput" class="form-label mt-3 mb-4" style="padding-left:12px; margin-right:73px;">Status</label>
        <div class="form-check form-check-inline">
            <input type="radio" id="Baik" name="status_barang" value="Baik">
            <label class="form-check-label" for="Baik" style="padding-right: 8px;">Baik</label>
            <input type="radio" id="Perawatan" name="status_barang" value="Perawatan">
            <label class="form-checklabel" for="Perawatan" style="padding-right: 8px;">Perawatan</label>
            <input type="radio" id="Rusak" name="status_barang" value="Rusak">
            <label class="form-checklabel" for="Rusak">Rusak</label>
        </div>
        </div>
    </div>

    <!-- Harga satuan -->
    <div class="row">
        <div class="col-md-3 ps-4 pb-3" style="font-family: 'Open Sans', sans-serif;">
            <label for="harga" class="col-form-label">Harga Satuan</label>
        </div>
        <div class="col-md-7">
            <input type="number" name="harga" autocomplete="off" class="padding" ariadescribedby="harga" style="padding: 3px 5px 3px 10px;" placeholder="Harga satuan">
        </div>
    </div>

    <!-- Button -->
    <div class="buton pt-2">
        <button type="submit" name="simpan" value="simpan" class="buttonn">Simpan</button>
        <a href="outputinventaris.php"><button type="button" name="batal" value="batal" class="buttonn1">Batal</button></a>
    </div>

    </form>
    </div>

    <!-- footer -->
    <footer class="footer" style="margin-top: 30px;">
        <p class="text-center fw-bold"> Inventaris 2016 </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>