<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website GalLery Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand" bg-collor="blue" href="index.php">Halaman komentar Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">

                </div>

                <a href="home.php" class="btn btn-outline-success m-1 bg-info">Kembali</a>

            </div>
        </div>
    </nav>

    <p>Selamat Datang <b><?= $_SESSION['namalengkap'] ?></b></p>

    <form action="tambah_komentar.php" method="post">
        <?php
        include "config/koneksi.php";
        $fotoid = $_GET['fotoid'];
        $sql = mysqli_query($conn, "SELECT * from foto where fotoid='$fotoid'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>

            <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>

            <div class="container">
                <div class="row">
                    <div class="col-md-50">
                        <div class="card mt-4">
                            <div class="card-header">Halaman foto</div>
                            <div class="card-body">
                                <table class="table justify-content-center">
                                    <thead>

                                        <table>
                                            <tr>
                                                <td>Judul</td>
                                                <td><input type="text" name="judulfoto" value="<?= $data['judulfoto'] ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi</td>
                                                <td><input type="text" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Foto</td>
                                                <td><img src="gambar/<?= $data['lokasifile'] ?>" width="200px"></td>
                                            </tr>
                                            <tr>
                                                <td>Komentar</td>
                                                <td><input type="text" name="isikomentar"></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td><input type="submit" name="Tambah"></td>
                                            </tr>
                                        </table>
                                    <?php
                                }
                                    ?>
    </form>

    <div class="container">
        <div class="row">
            <div class="col-md-50">
                <div class="card mt-4">
                    <div class="card-header">Data Komentarfoto</div>
                    <div class="card-body">
                        <table class="table justify-content-center">
                            <thead>
                                <table class="table table-success table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>komentar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>

                                    <?php
                                    include "config/koneksi.php";
                                    // session_start();

                                    $userid = $_SESSION['userid'];
                                    $sql = mysqli_query($conn, "select * from komentarfoto,
                user where komentarfoto.userid=user.userid");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    ?>

                                        <tr>
                                            <td><?= $data['komentarid'] ?></td>
                                            <td><?= $data['namalengkap'] ?></td>
                                            <td><?= $data['isikomentar'] ?></td>
                                            <td><?= $data['tanggalkomentar'] ?></td>
                                            <td><a class="btn btn-danger" href="hapus_komentar.php?komentarid=<?= $data['komentarid'] ?>"><i class="bi bi-trash3-fill"></i></a>
                                            </td>
                                        </tr>
                                    <?php

                                    }

                                    ?>
                                </table>

</body>

</html>