<?php

// Memanggil  class produk 
use Produk\Produk;
 session_start();
 require 'Produk.php';

//  menginisiasi object produk
$data = new Produk;

$barang = $data->readProduk();

// Kondisi jika user menggunakan fungsi search
if(isset($_GET['nama_barang'])) {
  $nama_barang = $_GET['nama_barang'];
  $barang = $data->searchBarang($nama_barang);
// var_dump($barang);
// exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Daftar List Barang</title>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
    
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger shadow">
    <div class="container">
      <a class="navbar-brand" href="#">Toko Bangunan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" >Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>  
      </ul>
      <form class="d-flex" role="search" method="get" action="#">
        <input name="nama_barang" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- Navbar End -->

<!-- Main Seccion Start -->
<main class="container">
  <hr/>
  <section class="bg-light p-5 rounded text-center">
    <img src="img.jpg" alt="Logo" width="300"> 
    <h1>Toko Bangunan</h1>
    <!-- Kondisi jika sudah login atau belum -->
    <?php if(isset($_SESSION['login'])){ ?>
      <a href="formBarang.php"> <button class="btn btn-success"> Form Tambah Barang </button> </a>
      <a href="logout.php"> <button> Log Out</button> </a>
        <?php }else{ ?>
          <a href="formLogin.php"> <button class="btn btn-success" > Form Login </button> </a>
        <?php } ?>
        <hr/>
        <table class="table table-striped">
          <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Barang</th>
                  <th class="bg_red" >Harga</th>
                  <th>Stock</th>
                </tr>
              </thead>
              <tbody>
                <!-- Menampilkan data dari database -->
               <?php foreach ($barang as $row) : ?>
                <tr>
                  <td class="bg_red border_rad_5" ><?php echo $row['id_barang']; ?></td>
                  <td class="border_rad_5" ><?php echo $row['nama_barang']; ?></td>
                  <td class="border_rad_5">Rp.<?php echo  number_format($row['harga_barang'],0,'','.'); ?></td>
                  <td class="border_rad_5"><?php echo $row['jumlah_stok']; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
          <!-- Menampilkan semua barang setelah fitur search -->
          <a href="listBarang.php">Kembali</a>
     </section>
</main>
<!-- Main Seccion End -->

  </body>
  </html>