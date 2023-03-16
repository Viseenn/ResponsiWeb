<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("location:login.php?pesan=belum_login");
    }
    include ('connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' && password = '$password'") or die (mysqli_error($connect));

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location:home.php");
    }else{
        header("location:login.php?pesan=gagal");
    }
?>
