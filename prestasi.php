<!DOCTYPE html>
<html>
<head>
  <title>prestasi muhpat</title>
  <link rel="stylesheet" href="asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="asset/style.css">

</head>
<body>

  <!-- topbar -->
  <section id="topbar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           <ul class="top-contact">
              <li><a href=""><i class="fas fa-phone"></i>021-909-222-111</a></li>
              <li><a href=""><i class="fas fa-envelope"></i>muhpatkendal@sch.id</a></li>
              <li><a href=""><i class="fas fa-bullhorn"></i>PPDB TA 2020/2021 telah dibuka!</a></li>
            </ul>
        </div>
      </div>
    </div>
    </section>

    <!-- header -->
    <header>
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="brand">
              <img src="asset/img/muhpat.png" height="80" width="80">
             <div class="brand-name">
                <h1>SMA MUHAMMADIYAH 4 KENDAL</h1>
              <h3>sekolah berbasis agama islam</h3>
             </div>
            </div>
          </div>
          <img src="asset/img/akred.png" height="90" width="160">
      </div>
    </header>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-biru">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Profil</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="sejarah.php">Sejarah</a>
              <a class="dropdown-item" href="visi.php">Visi dan Misi</a>
              <a class="dropdown-item" href="sambutan.php">Sambutan Kepala Sekolah</a>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="prestasi.php">Prestasi</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="fasilitas.php">Fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ekstra.php">Ekstrakulikuler</a>
          </li>
          <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Galeri</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="foto.php">Foto</a>
              <a class="dropdown-item" href="video.php">Video</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="ipm.php" class="nav-link">IPM DAERAH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Kontak</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">PPDB</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>

        <!-- konten -->
        <br><br>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-8">
          <div class="konten">
            <h3>  Prestasi SMA Muhammadiyah 4 Kendal</h3>
            <div class="progress">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            <div class="row">           
                <?php
                  include 'koneksi.php';
                  $perPage = 8;

                  if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                  } else{
                    $page = 1;
                  }
                  if ($page > 1) {
                    $start = ($page * $perPage) - $perPage;
                  } else {
                    $start = 0;
                  }

                  $query = mysqli_query($koneksi, "SELECT * FROM prestasi ORDER BY id_prestasi DESC LIMIT $start, $perPage");
                    while ($result = mysqli_fetch_assoc($query)) {

              ?>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <img src="asset/img/prestasi/<?= $result['foto'] ?>" height="260">
                    <div class="card-body">
                      <h5><?= substr($result['judul'], 0, 25). "..." ?></h5>
                      <p class="card-title"><?= substr($result['deskripsi'], 0, 33). "..." ?></p>
                  </div>
                      <p><a href="detail-prestasi.php?id=<?= $result['id_prestasi']; ?>" class="btn btn-primary ml-2">Baca selengkapnya</a></p>
                </div>
            </div>  
            <?php  } ?>
          </div><br>

          <?php
           $query = mysqli_query($koneksi, "SELECT * FROM galeri");
           $jmlh_brs = mysqli_num_rows($query);
           $halaman = ceil($jmlh_brs/$perPage);
           for ($i=1; $i <= $halaman ; $i++) { 
              echo "<a href='?page=$i'>$i </a>";
           }
        ?>
        </div>
      </div>
        <?php include 'qq.php'; ?>
        </div>
        
      </div>
    </div>

      <br><br>

      <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> 
    <!-- Footer -->
      <?php 
      include "footer.php";
      ?>



    <script src="asset/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>

</body>
</html>