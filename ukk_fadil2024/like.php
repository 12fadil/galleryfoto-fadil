<?php
include "config/koneksi.php";
session_start();

if (!isset($_SESSION['userid'])) {
    header("location:login.php");
} else {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];


    $sql = mysqli_query($conn, "SELECT * from likefoto where fotoid='$fotoid' and userid='$userid'");

    if (mysqli_num_rows($sql) == 1) {
        header("location:home.php");
    } else {
        $tanggallike = date("y-m-d");
        mysqli_query($conn, "insert into likefoto values('','$fotoid','$userid','$tanggallike')");
        header("location:home.php");
    }
}
