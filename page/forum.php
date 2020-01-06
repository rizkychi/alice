<body class="fixed-sn homepage-v3">

  <!-- Main layout -->
  <main class="pt-4">
    <div class="container-fluid">
      <!-- Magazine -->
      <div class="row">
        <!-- Main news -->
        <div class="col-xl-8 col-md-12">
        <?php
          if (isset($_GET['id'])) {
              include 'forum-post.php';
          } else {
              ?>
                <!-- Section: Magazine posts -->
                <section class="section extra-margins mt-2">
                    <!-- SELECT post_id, post_subject, post_view FROM tb_forum_post ORDER BY post_date DESC -->
                    <?php
        require_once 'config/conf.php';
        $query  = mysqli_query($conn, "SELECT * FROM tb_forum_post ORDER by post_date desc limit 1;");
        $result = mysqli_fetch_array($query);
        $judul = $result['post_subject'];
        $isi = $result['post_content'];
        $tanggal = $result['post_date'];
        $sender = $result['post_user'];
        //var_dump($judul);
        ?>
                    <h4 class="font-weight-bold"><strong>POST TERBARU</strong></h4>
                    <hr class="red title-hr">

                    <!-- News card -->
                    <div class="card mb-3 text-center">
                    <div class="card-body">
                        <!-- Grid row -->
                        <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 mx-3 my-3">
                            <!-- Featured image -->
                            <div class="view overlay">
                            <img src="img/alice-img/avatar.png" class="rounded-circle img-fluid mx-auto"
                                alt="Avatar">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-8 text-left mt-3">
                            <h4 class="mb-4"><strong><?php echo $judul ?></strong></h4>
                            <p class="dark-grey-text"><?php echo $isi; ?></p>
                            <p>by <a><strong><?php echo $sender; ?></strong></a>, <?php echo $tanggal; ?></p>
                            <a class="btn btn-secondary btn-sm">Baca selengkapnya</a>
                        </div>
                        <!-- Grid column -->
                        </div>
                        <!-- Grid row -->

                        <!-- Grid row -->
                        <div class="row mt-4">
                        <!-- Grid column -->
                        <div class="col-md-5 mx-4 my-3">
                            <?php 
                    $sql =  "SELECT post_date, post_subject, post_id FROM tb_forum_post ORDER by post_date desc limit 3";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_array($result)) {
                                            //var_dump($row[1]);
                    ?>
                                        <!-- Small news -->
                                        <div class="single-news">
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                <!-- Image -->
                                                <div class="view overlay rgba-white-slight mb-2">
                                                    <img src="img/alice-img/avatar.png"
                                                    class="img-fluid rounded-circle w-75 mx-auto alice-avatar" alt="Avatar">
                                                    <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                    </a>
                                                </div>
                                                </div>
                                                <!-- Excerpt -->
                                                <div class="col-md-8">
                                                <p class="font-small text-left mb-2"><strong><?php echo date('d-m-Y', strtotime($row[0])); ?></strong></p>
                                                <p class="text-left"><a href="?p=forum&id=<?php echo $row[2]; ?>" class="text-secondary stretched-link text"><?php echo ($row[1]); ?>
                                                    <i class="fas fa-angle-right float-right"></i>
                                                    </a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Small news -->
                                    <?php
                                } 
                                }   
                            ?>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-5 mx-4 my-3">
                            <?php 
                    $sql =  "SELECT post_date, post_subject, post_id FROM tb_forum_post ORDER by post_date desc limit 3 offset 3";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_array($result)) {
                                           
                    ?>
                                        <!-- Small news -->
                                        <div class="single-news">
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                <!-- Image -->
                                                <div class="view overlay rgba-white-slight mb-2">
                                                <img src="img/alice-img/avatar.png"
                                                    class="img-fluid rounded-circle w-75 mx-auto alice-avatar" alt="Avatar">
                                                    <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                    </a>
                                                </div>
                                                </div>
                                                <!-- Excerpt -->
                                                <div class="col-md-8">
                                                <p class="font-small text-left mb-2"><strong><?php echo (date('d-m-Y', strtotime($row[0]))); ?></strong></p>
                                                <p class="text-left"><a href="?p=forum&id=<?php echo $row[2]; ?>" class="text-secondary stretched-link text"><?php echo ($row[1]); ?>
                                                    <i class="fas fa-angle-right float-right"></i>
                                                    </a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Small news -->
                                    <?php
                                }
                                }    
                            ?>
                        </div>
                        <!-- Grid column -->
                        </div>
                    </div>
                    <!-- News card -->
                    </div>

                    <!-- Grid row -->
                    <h4 class="font-weight-bold mt-5"><strong>POST PALING DIMINATI</strong></h4>
                    <hr class="red title-hr">
                    <!-- Grid row -->
                    <div class="row mb-4">
                    <?php
                        for ($i=0; $i < 6; $i++) { 
                            ?>
                                <!-- Grid column -->
                                <div class="col-md-4 my-3">
                                    <!-- Card -->
                                    <div class="card">
                                    <!-- Card content -->
                                    <div class="card-body">
                                        <!-- Title -->
                                        <h4 class="card-title"><strong>POST TITLE</strong></h4>
                                        <hr>
                                        <!-- Text -->
                                        <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk
                                        of the card's
                                        content.
                                        </p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o"></i>
                                        27/08/2017</p>
                                        <p class="font-small grey-text mb-0">Anna Smith</p>
                                        <p class="text-right mb-0 font-small font-weight-bold text-secondary"><a>Baca selengkapnya <i
                                            class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!-- Card content -->
                                    </div>
                                    <!-- Card -->
                                </div>
                                <!-- Grid column -->
                            <?php
                        }
                    ?>
                    </div>
                    <!-- Section: Magazine posts -->
                
                    <div class="row justify-content-center mb-4">
                        <a href="#" class="btn btn-secondary">Lihat semua post</a>
                    </div>
                    
                </section>
              <?php
          }
        ?>
          

        </div>
        <!-- Main news -->

        <!-- Sidebar -->
        <div class="col-xl-4 col-md-12 widget-column mt-0">

            <!-- Section: Search -->
            <section class="section mb-5">
                <h4 class="font-weight-bold mt-2"><strong>PENCARIAN</strong></h4>
                <hr class="red title-hr">
                <!-- Search form -->
                <form class="md-form form-inline active-purple-3 active-purple-4 mx-auto">
                    <input class="w-100 form-control" type="text" placeholder="Cari postingan" aria-label="Search">
                </form>
                <!-- Search form -->
            </section>
            <!-- Section: Search -->

            <!-- Section: Categories -->
            <section class="section mb-5">
                <h4 class="font-weight-bold mt-2"><strong>KATEGORI</strong></h4>
                <hr class="red title-hr">
                <ul class="list-group z-depth-1 mt-4">
                <?php
                //$sql = "SELECT course_id,course_name,course_sks FROM tb_course";
                $sql = "SELECT course_name FROM tb_course INNER JOIN tb_forum_post on course_id = post_course group by course_name";
               $count = "SELECT COUNT(post_id) FROM tb_forum_post GROUP by post_course";
                $result = mysqli_query($conn, $sql);
               // $hitung = mysqli_query($conn, $count);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a><?php echo $row[0];?></a>
                                        <span class="badge badge-danger badge-pill">4</span>
                                    </li>
                <?php
                  } 
                 } else {
                     echo "0 Result";
                 }
                ?>

                    <li class="list-group-item d-flex justify-content-center align-items-center">
                        <a href="#" class="text-secondary">Lihat Selengkapnya</a>
                    </li>
                </ul>

            </section>
            <!-- Section: Categories -->

            <!-- Section: Featured posts -->
            <section class="section widget-content mt-5">

                <!-- Heading -->
                <h4 class="font-weight-bold mt-2"><strong>POST POPULER</strong></h4>
                <hr class="red title-hr">
                <!-- Heading -->

                <div class="card card-body pb-0 mt-4 mb-4">
                    <?php
                        for ($i=0; $i < 5; $i++) { 
                            ?>
                                <div class="single-post">
                                    <!-- Grid row -->
                                    <div class="row">
                                        <div class="col-4">
                                            <!-- Image -->
                                            <div class="view overlay rgba-white-slight">
                                                <img src="img/alice-img/avatar.png"
                                                    class="img-fluid rounded-0 w-75 ml-2" alt="Avatar">
                                                <a>
                                                    <div class="mask waves-light"></div>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Excerpt -->
                                        <div class="col-8">
                                            <div class="post-data">
                                                <a href="?p=forum&id=1" class="text-secondary stretched-link"><strong>Title of the news</strong></a>
                                                <p class="font-small mb-0 text-black-50">
                                                    25/08/2016
                                                </p>
                                                <a class="font-small mb-0"><i class="fas fa-comment-alt"></i>
                                                    114
                                                </a>
                                                <a class="font-small mb-0 ml-3"><i class="fas fa-eye"></i></i>
                                                    114
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Excerpt -->
                                    </div>
                                    <!-- Grid row -->
                                </div>
                            <?php
                            if ($i != 4) {
                                echo '<hr>';
                            } else {
                                echo '<div class="mb-4"></div>';
                            }
                        }
                    ?>
                </div>
            </section>
            <!-- Section: Featured posts -->

        </div>
        <!-- Sidebar -->

      </div>
      <!-- Magazine -->

    </div>

  </main>
  <!-- Main layout -->