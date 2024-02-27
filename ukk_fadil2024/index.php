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
</head>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container">
    <a class="navbar-brand" bg-collor="blue" href="index.php">Website Gallery Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
      <marquee class="display-6 text-silver fw-bold"><mark>Selamat Datang di Gallery foto 2024 </mark></marquee>
      </div>
      <a href="registrasi.php" class="btn btn-outline-success m-1 bg-info">Dafatar</a>
      <a href="login.php" class="btn btn-outline-success m-1 bg-warning">Masuk</a>
    </div>
  </div>
</nav>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <img src="gambar/poto.jpg" class="card-img-top" title="" style="height:12rem;">
        <div class="card-footer text-center">
          <a href="">100 Suka</a>
          <a href="">70 komentar</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <img src="gambar/foto.jpg" class="card-img-top" title="" style="height:12rem;">
        <div class="card-footer text-center">
          <a href="">76 Suka</a>
          <a href="">7 komentar</a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-secondary fixed-bottom">
        <p>&copy; UKK RPL 2024 | Muhamad Fadilah</p>
    </footer>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>