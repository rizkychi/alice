<?php
    $query = mysqli_query($conn, "SELECT * FROM tb_material");
?>

<body class="fixed-sn homepage-v3">

  <!-- Main layout -->
  <main class="pt-4">
    <div class="container-fluid">
      <!-- Magazine -->
      <div class="row">
        <!-- Main news -->
        <div class="col-xl-12 col-md-12">
        <?php
          if (isset($_GET['id'])) {
              include 'forum-post.php';
          } else {
              ?>
                <!-- Section: Magazine posts -->
                <section class="section extra-margins mt-2">
                    <!-- Grid row -->
                    <h4 class="font-weight-bold mt-5"><strong>MATERI TERBARU</strong></h4>
                    <hr class="red title-hr">
                    <!-- Grid row -->
                    <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
                        <div class="row align-items-center controls-top">
                            <div class="col-md-1 d-none d-md-block d-lg-block">
                                <a class="" href="#carousel-example-multi" data-slide="prev"><i
                                    class="fas fa-chevron-left"></i></a>
                            </div>
                            <div class="col-md-10">
                                <div class="carousel-inner v-2" role="listbox">
                                    <?php
                                        for ($i=0; $i < 6; $i++) { 
                                            ?>
                                                <div class="carousel-item <?php if ($i == 1) echo 'active'; ?>">
                                                    <div class="col-12 col-md-4 my-2">
                                                        <!-- Card -->
                                                        <div class="card">
                                                            <!-- Card content -->
                                                            <div class="card-body">
                                                                <!-- Title -->
                                                                <h6 class="card-title"><strong>POST TITLE</strong></h6>
                                                                <a href="#"><span class="w-75 badge badge-pill badge-success text-truncate z-depth-0">
                                                                Nama mata kuliasdasdasdasdah</span></a>
                                                                <hr class="mt-1">
                                                                <div class="row mb-3">
                                                                    <p class="col-md-6 mb-0 font-small dark-grey-text text-truncate"><i class="fas fa-download"></i>
                                                                    123123 </p>
                                                                    <p class="col-md-6 mb-0 font-small font-weight-bold dark-grey-text"><i class="far fa-clock"></i>
                                                                    27/08/2017</p>
                                                                </div>
                                                                <p class="col-md-12 font-small my-3">tidak ada deskripsi</p>
                                                                <hr>
                                                                <div class="row">
                                                                    <p class="col-md-6 mb-0 font-small font-weight-bold dark-grey-text text-truncate"><i class="far fa-user"></i>
                                                                    <a href="?p=profile&id=" class="text-secondary">
                                                                    Anna Smith</a></p>
                                                                    <p class="col-md-6 mb-0 font-small font-weight-bold dark-grey-text">
                                                                    <a href="?p=materi-post&id=" class="text-secondary">
                                                                    Lihat materi <i class="fas fa-angle-right"></i></a></p>
                                                                </div>
                                                            </div>
                                                            <!-- Card content -->
                                                        </div>
                                                        <!-- Card -->
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-1 d-none d-md-block d-lg-block">
                                <a class="" href="#carousel-example-multi" data-slide="next"><i
                                    class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Grid row -->
                    <h4 class="font-weight-bold mt-5"><strong>PALING BANYAK DIUNDUH</strong></h4>
                    <hr class="red title-hr">
                    <!-- Grid row -->
                    <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
                        <div class="row align-items-center controls-top">
                            <div class="col-md-1 d-none d-md-block d-lg-block">
                                <a class="" href="#carousel-example-multi" data-slide="prev"><i
                                    class="fas fa-chevron-left"></i></a>
                            </div>
                            <div class="col-md-10">
                                <div class="carousel-inner v-2" role="listbox">
                                    <?php
                                        for ($i=0; $i < 6; $i++) { 
                                            ?>
                                                <div class="carousel-item <?php if ($i == 1) echo 'active'; ?>">
                                                    <div class="col-12 col-md-4 my-2">
                                                        <!-- Card -->
                                                        <div class="card">
                                                            <!-- Card content -->
                                                            <div class="card-body">
                                                                <!-- Title -->
                                                                <h6 class="card-title"><strong>POST TITLE</strong></h6>
                                                                <a href="#"><span class="w-75 badge badge-pill badge-success text-truncate z-depth-0">
                                                                Nama mata kuliasdasdasdasdah</span></a>
                                                                <hr class="mt-1">
                                                                <div class="row mb-3">
                                                                    <p class="col-md-6 mb-0 font-small dark-grey-text text-truncate"><i class="fas fa-download"></i>
                                                                    123123 </p>
                                                                    <p class="col-md-6 mb-0 font-small font-weight-bold dark-grey-text"><i class="far fa-clock"></i>
                                                                    27/08/2017</p>
                                                                </div>
                                                                <p class="col-md-12 font-small my-3">tidak ada deskripsi</p>
                                                                <hr>
                                                                <div class="row">
                                                                    <p class="col-md-6 mb-0 font-small font-weight-bold dark-grey-text text-truncate"><i class="far fa-user"></i>
                                                                    <a href="?p=profile&id=" class="text-secondary">
                                                                    Anna Smith</a></p>
                                                                    <p class="col-md-6 mb-0 font-small font-weight-bold dark-grey-text">
                                                                    <a href="?p=materi-post&id=" class="text-secondary">
                                                                    Lihat materi <i class="fas fa-angle-right"></i></a></p>
                                                                </div>
                                                            </div>
                                                            <!-- Card content -->
                                                        </div>
                                                        <!-- Card -->
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-1 d-none d-md-block d-lg-block">
                                <a class="" href="#carousel-example-multi" data-slide="next"><i
                                    class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                
                    <div class="row justify-content-center mb-4">
                        <a href="#" class="btn btn-secondary">Lihat semua materi</a>
                    </div>
                    
                </section>
              <?php
          }
        ?>
          

        </div>
        <!-- Main news -->

        <!-- sidebar -->

      </div>
      <!-- Magazine -->

    </div>

  </main>
  <!-- Main layout -->