<?php 
    include ('connect.php');
    session_start();
    if(empty($_SESSION['username'])){
        header("location:login.php?pesan=belum_login");
    }

    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $tgl_datang = $_POST['tgl_datang'];
    $kategori = $_POST['kategori'];
    $status_barang = $_POST['status_barang'];
    $harga = $_POST['harga'];

    $query = mysqli_query($conn, "INSERT INTO inventaris VALUES ('$kode_barang','$nama_barang','$jumlah','$satuan','$tgl_datang','$kategori','$status_barang', '$harga')")
    or die(mysqli_error($conn));

    if($query){
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='outputinventaris.php'</script>";
    }else{
        echo "<script>alert('Data gagal ditambahkan!'); window.location.href='outputinventaris.php'</script>";
    }
?>