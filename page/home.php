<body class="fixed-sn homepage-v3">

  <!-- Main layout -->
  <main class="pt-4">
    <div class="container-fluid">
      <!-- Magazine -->
      <div class="row">
        <!-- Main news -->
        <div class="col-xl-8 col-md-12">
        
        <div class="container-fluid">
        <h4 class="font-weight-bold mt-2"><strong>DAFTAR KELAS YANG DIIKUTI</strong></h4>
         <hr class="red title-hr">
     <div class="d-flex flex-wrap justify-content-start">    
        <?php
            for ($i=0; $i < 2; $i++) { 
                ?>
                    <div class="alice-class m-3">
                        <div class="card">
                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!-- Button -->
                            <a class="btn-floating btn-action ml-auto mr-4 purple-gradient"><i class="fas fa-chevron-right pl-1"></i></a>
                            <!-- Card content -->
                            <div class="card-body">
                                <!-- Title -->
                                <h4 class="card-title">Nama kelas</h4>
                                <hr>
                                <!-- Text -->
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="rounded-bottom purple-gradient lighten-3 text-center pt-3">
                                <ul class="list-unstyled list-inline font-small">
                                    <!-- <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>05/10/2015</li> -->
                                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fas fa-user pr-1"></i>12 Siswa</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</div>

<br>
<br>
<h4 class="font-weight-bold mt-2"><strong>INFORMASI PERKULIAHAN</strong></h4>
                <hr class="red title-hr">

<!-- Table with panel -->
<div class="card card-cascade narrower">

<!--Card image-->
<br>
<br>

<div class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-center align-items-center">

<a href="" class="white-text mx-3">Jadwal Kuliah</a>

</div>
<!--/Card image-->

<div class="px-4">

<div class="table-wrapper table-responsive">
    <!--Table-->
    <table class="table table-hover mb-0">

    <!--Table head-->
    <thead>
        <tr class="text-uppercase">
            <th class="th-md">
                <a>Hari</a>
            </th>
            <th class="th-md">
                <a href="">Mata Kuliah</a>
            </th>
            <th class="th-md">
                <a href="">Jam</a>
            </th>
            <th class="th-md">
                <a href="">Dosen</a>
            </th>
            <th class="th-md">
                <a href="">Ruang</a>
            </th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->


        <tbody>
        <!-- <tr>
            <td>1</td>
            <td>Pemrograman Web Lanjut</td>
        </tr> -->
        
    </tbody>
    <!--Table body-->
    </table>
    <!--Table-->
</div>

</div>

</div>
<!-- Table with panel -->

          

        </div>
        <!-- Main news -->

        <!-- Sidebar -->
        <div class="col-xl-4 col-md-12 widget-column mt-0">

            <!-- Section: Categories -->
                    
            <section class="section mb-5">
                <h4 class="font-weight-bold mt-2"><strong>DAFTAR TUGAS</strong></h4>
                <hr class="red title-hr">
                <ul class="list-group z-depth-1 mt-4">
                <?php
            $sql = "SELECT course_id,course_name,course_sks FROM tb_course";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_array($result)) {
                ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a><?php echo $row[1];?></a>
                                    <span class="badge badge-danger badge-pill">3</span>
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
                $sql = "SELECT post_id,post_user,post_subject,post_content,post_date FROM tb_forum_post";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_array($result)) {
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
                                                <a href="?p=forum&id=1" class="text-secondary stretched-link"><strong><?php echo $row[2];?></strong></a>
                                                <p class="font-small mb-0 text-black-50">
                                                <?php echo $row[4];?>
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
              } 
             } else {
                 echo "0 Result";
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