<?php
    include('connect.php');
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

    $sql = mysqli_query($conn, "UPDATE inventaris SET kode_barang='$kode_barang', nama_barang='$nama_barang', jumlah='$jumlah', satuan='$satuan', tgl_datang='$tgl_datang', kategori='$kategori', status_barang='$status_barang', harga='$harga' WHERE kode_barang = '$kode_barang'");
    
    if($sql){
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='outputinventaris.php'</script>";
    }else{
        echo "<script>alert('Data gagal diupdate!'); window.location.href='outputinventaris.php'</script>";
    }
?>