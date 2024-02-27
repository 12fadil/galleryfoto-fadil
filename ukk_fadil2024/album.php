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
            <a class="navbar-brand" bg-collor="blue" href="index.php">Halaman Album</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <marquee class="display-6 text-silver fw-bold"><mark>Selamat Datang di GalLery foto Halaman
                            Album</mark> </marquee>
                </div>
                <a href="foto.php" class="btn btn-outline-success m-1 bg-primary">Foto</a>
                <a href="logout.php" class="btn btn-outline-success m-1 bg-danger">Keluar</a>
            </div>
        </div>
    </nav>
    <p>Selamat datang <b><?= $_SESSION['namalengkap'] ?><b></p>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Album</div>
                    <div class="card-body">
                        <form action="tambah_album.php" method="POST">
                            <label class="form-label">Nama Album</label>
                            <input type="text" name="namaalbum" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Album</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>TanggalDiBuat</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                include "config/koneksi.php";
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $data['albumid'] ?></td>
                                        <td><?= $data['namaalbum'] ?></td>
                                        <td><?= $data['deskripsi'] ?></td>
                                        <td><?= $data['tanggaldibuat'] ?></td>
                                        <td>
                                            <a class="btn btn-danger" href="hapus_album.php?albumid=<?= $data['albumid'] ?>"><i class="bi bi-trash3-fill"></i></a>
                                            <a class="btn btn-danger" href="edit_album.php?albumid=<?= $data['albumid'] ?>"><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
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