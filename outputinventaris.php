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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="responsi.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

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
          <div class="nav-item dropdown" style=" font-family: 'Lato' , sans-serif;">
            <button class="dropbtn"> List per Kategori </button>
              <div class="dropdown-content">
                <a class="dropdown-item" href="outputinventaris.php?kategori=bangunan">Bangunan</a>
                <a class="dropdown-item" href="outputinventaris.php?kategori=kendaraan">Kendaraan</a>
                <a class="dropdown-item" href="outputinventaris.php?kategori=alattulis">Alat Tulis Kantor</a>
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

  <div class="tambah">
    <a href="tambah.php"><button type="input" class="tambah1" style="border:none; padding: 4px 8px 4px 7px;"><i class="bi bi-plus"></i> Tambah</button></a>
  </div>
  <div class="tabel border='1'" style="font-family: 'Open Sans', sans-serif;">
    <table class="table table-borderless">
      <thead class="toptable">
        <tr>
          <th>No </th>
          <th>Kode </th>
          <th>Nama Barang </th>
          <th>Jumlah </th>
          <th>Satuan </th>
          <th>Tanggal Datang </th>
          <th>Kategori </th>
          <th>Status </th>
          <th>Harga Satuan </th>
          <th>Total Harga </th>
          <th>Aksi </th>
        </tr>
      </thead>

      <?php 
        include ('connect.php');
        if(isset($_GET['kategori'])){
          $kategori=$_GET['kategori'];
          if($kategori=="bangunan") $kategori="Bangunan";
          elseif($kategori=="kendaraan") $kategori="Kendaraan";
          elseif($kategori=="alattulis") $kategori="Alat Tulis Kantor";
          elseif($kategori=="elektronik") $kategori="Elektronik";
          $query="WHERE kategori = '$kategori'";
        }else{
            $query='';
        }

        $sql = mysqli_query($conn, "SELECT * FROM inventaris $query ORDER BY kategori ASC");
        $total = 0;
        $totall= 0;
        $no = 1;
        while($data = mysqli_fetch_array($sql)){
        $total = $data['jumlah']*$data['harga'];
        $totall += $total;
        echo '
          <tr>
          <td style="width:30px;"> '.$no.' </td>
        ';
        $no++;
      ?>
      <td style="width:40px;">
        <?php echo $data['kode_barang'];?>
      </td>
      <td>
        <?php echo $data['nama_barang'];?>
      </td>
      <td style="width:20px;">
        <?php echo $data['jumlah'];?>
      </td>
      <td style="width:20px;">
        <?php echo $data['satuan'];?>
      </td>
      <td style="width:100px;">
        <?php echo date("d-m-Y", strtotime($data['tgl_datang']));?>
      </td>
      <td>
        <?php echo $data['kategori'];?>
      </td>
      <td>
        <?php echo $data['status_barang'];?>
      </td>
      <td>
        <span>
          <?php echo 'Rp. ' . number_format((int)$data['harga'], 2,",",".");?>
        </span>
      </td>
      <td>
        <span>
          <?php echo 'Rp. ' . number_format((int)$total, 2,",",".");?>
        </span>
      </td>

      <input type="hidden" name="kode_barang" value="<?= $data['kode_barang']; ?>">

      <td>
        <a class="buttonn" href="ubah.php?kode_barang=<?= $data['kode_barang']?>">Edit </a>
        <a type="submit" value="delete" class="buttonn1"
        href="hapus.php?kode_barang=<?= $data['kode_barang']?>">Hapus </a>
      </td>
      </tr>
    <?php
      }
    ?>
    </table>
    </div>

    <div class="total">
      Total Inventaris =
      <span>
        <?php echo 'Rp. ' . number_format((int)$totall, 2,",",".");?>
      </span>
    </div>

    <!-- footer -->
    <footer class="footer" style="margin-top: 33px;">
        <p class="text-center fw-bold"> Inventaris 2016 </p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>