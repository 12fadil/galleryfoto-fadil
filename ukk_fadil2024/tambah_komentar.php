<?php
include "config/koneksi.php";
session_start();

$fotoid=$_POST['fotoid'];
$isikomentar=$_POST['isikomentar'];
$tanggalkomentar=date("y-m-d");
$userid=$_SESSION['userid'];

$sql=mysqli_query($conn,"INSERT INTO komentarfoto VALUES('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");
    
    header("location:komentar.php?fotoid=".$fotoid);
?>