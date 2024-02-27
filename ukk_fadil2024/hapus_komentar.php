<?php
include "config/koneksi.php";
session_start();

$komentarid = $_GET['komentarid'];

$sql = mysqli_query($conn, "delete from komentarfoto where komentarid='$komentarid'");


header("location:komentar.php?fotoid=34");
?>