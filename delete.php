<?php
    include('connect.php');
    session_start();
    if(empty($_SESSION['username'])){
        header("location:login.php?pesan=belum_login");
    }
    
    $kode_barang = $_GET['kode_barang'];

    $query = mysqli_query($conn, "DELETE FROM inventaris WHERE kode_barang='$kode_barang'");

    if($query){
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='outputinventaris.php'</script>";
    }else{
        echo "<script>alert('Data gagal dihapus!'); window.location.href='outputinventaris.php'</script>";
    }
?>
