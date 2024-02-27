<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>



<?php
// session_start();
// if(!isset($_SESSION['userid'])){
//     header("location:login.php");
// }
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
            <a class="navbar-brand" bg-collor="blue" href="index.php">Halaman Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <marquee class="display-6 text-silver fw-bold"><mark>================Selamat Datang di GalLeryFoto
                            2024===============</mark> </marquee>
                </div>
                <a href="foto.php" class="btn btn-outline-success m-1 bg-primary">Foto</a>
                <a href="album.php" class="btn btn-outline-success m-1 bg-warning">Album</a>
                <a href="logout.php" class="btn btn-outline-success m-1 bg-danger">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-50">
                <div class="card mt-4">
                    <div class="card-header">Halaman lading</div>
                    <div class="card-body">
                        <table class="table table-bordered border-primary">
                            <thead>

                                <tr>
                                    <th>Id</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Uploader</th>
                                    <th>Jumlah like</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                include "config/koneksi.php";
                                $sql = mysqli_query($conn, "SELECT * from foto,user where foto.userid=user.userid");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $data['fotoid'] ?></td>
                                        <td><?= $data['judulfoto'] ?></td>
                                        <td><?= $data['deskripsifoto'] ?></td>
                                        <td><img src="gambar/<?= $data['lokasifile'] ?>" width="200px"></td>
                                        <td><?= $data['namalengkap'] ?></td>
                                        <td>
                                            <?php
                                            $fotoid = $data['fotoid'];
                                            $sql2 = mysqli_query($conn, "SELECT * from likefoto where fotoid='$fotoid'");
                                            echo mysqli_num_rows($sql2);
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="like.php?fotoid=<?= $data['fotoid'] ?>"><i class="bi bi-heart-fill"></i></a>
                                            <a class="btn btn-danger" href="komentar.php?fotoid=<?= $data['fotoid'] ?>"><i class="bi bi-chat-dots"></i></a>
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

    <footer class="d-flex justify-content-center border-top mt-3 bg-info fixed-bottom">
        <p>&copy; UKK RPL 2024 | Muhamad Fadilah</p>
    </footer>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>