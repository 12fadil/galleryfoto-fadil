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
            <a class="navbar-brand" bg-collor="blue" href="index.php">Halaman Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <marquee class="display-6 text-silver fw-bold"><mark>Selamat Datang di GalLery foto Halaman
                            Foto</mark> </marquee>
                </div>
                <a href="home.php" class="btn btn-outline-success m-1 bg-danger">Kembali</a>
            </div>
        </div>
    </nav>

    <p>Selamat datang <b><?= $_SESSION['namalengkap'] ?><b></p>
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">

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
                                            <td><input type="text" name="judulfoto"></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td><input type="text" name="deskripsifoto"></td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi File</td>
                                            <td><input type="file" name="lokasifile"></td>
                                        </tr>
                                        <tr>
                                            <td>Album</td>
                                            <td>
                                                <select name="albumid">
                                                    <?php
                                                    include "config/koneksi.php";
                                                    $userid = $_SESSION['userid'];
                                                    $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?= $data['albumid'] ?>"><?= $data['namaalbum'] ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" value="Tambah"></td>
                                        </tr>
                                    </table>
    </form>

    <div class="container">
        <div class="row">
            <div class="col-md-50">
                <div class="card mt-4">
                    <div class="card-header">Halaman foto</div>
                    <div class="card-body">
                        <table class="table justify-content-center">
                            <thead>

                                <table class="table table-bordered border-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggalungah</th>
                                        <th>LokasiFile</th>
                                        <th>Album</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                    include "config/koneksi.php";
                                    $userid = $_SESSION['userid'];
                                    $sql = mysqli_query($conn, "SELECT * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?= $data['fotoid'] ?></td>
                                            <td><?= $data['judulfoto'] ?></td>
                                            <td><?= $data['deskripsifoto'] ?></td>
                                            <td><?= $data['tanggalunggah'] ?></td>
                                            <td><img src="gambar/<?= $data['lokasifile'] ?>" width="200px"></td>
                                            </td>
                                            <td><?= $data['namaalbum'] ?></td>
                                            <td>
                                                <a class="btn btn-danger" href="hapus_foto.php?fotoid=<?= $data['fotoid'] ?>"><i class="bi bi-trash3-fill"></i></a>
                                                <a class="btn btn-danger" href="edit_foto.php?fotoid=<?= $data['fotoid'] ?>"><i class="bi bi-pencil-square"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>