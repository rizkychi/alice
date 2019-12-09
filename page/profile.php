
<!--Main Layout-->
<main>

<div class="container">

  <!--Section: Team v.1-->
  <section class="text-center team-section">

    <!--Grid row-->
    <div class="row text-center">

      <!--Grid column-->
      <div class="col-md-12 mt-5">

        <div class="avatar mx-auto">
          <img src="img/alice-img/avatar.png" class="img-fluid rounded-circle z-depth-1" style="width:100px;height:100px;" alt="Avatar">
        </div>
        <h3 class="my-3 font-weight-bold">
          <strong>
                <a>Dosen</a>
          </strong>
        </h3>
        <span class="badge badge-pill badge-success">
         <?php
         $sql = "SELECT profile_status FROM tb_lecturer_profile";
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
         // output data of each row
         while($row = mysqli_fetch_array($result)) {
         echo $row["profile_status"];
          }
           } else {
           echo "0 results";
           }
           ?>
        </span>

        <!-- About Lecturer -->
        <p class="mt-3">
        <?php
          $sql = "SELECT profile_about FROM tb_lecturer_profile";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_array($result)) {
          echo $row["profile_about"];
          }
          } else {
          echo "0 results";
          }
          ?>
        </p>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </section>
  <!--Section: Team v.1-->

  <!--Section: Tabs-->
  <section>

    <ul class="nav md-pills pills-secondary d-flex justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panel11" role="tab">
          <i class="fas fa-user-tie mr-1" aria-hidden="true"></i>
          <strong>Informasi Umum</strong>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel12" role="tab">
          <i class="fas fa-bars mr-1" aria-hidden="true"></i>
          <strong>Informasi Perkuliahan</strong>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel13" role="tab">
        <i class="fas fa-calendar-alt mr-1" aria-hidden="true"></i>
          <strong>Daftar Kelas</strong>
        </a>
      </li>
    </ul>

    <!-- Tab panels -->
    <div class="tab-content">

      <!--Panel 1-->
      <div class="tab-pane fade show active" id="panel11" role="tabpanel">
        <br>

        <!--Grid row-->
        <div class="row justify-content-center">

          <!--Grid column-->
          <div class="col-md-10">

            <div class="jumbotron">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <h4 class="h4"><i class="fas fa-envelope mr-3"></i>Alamat email</h4>
                  <a href="mailto:example@mail.com">
                    <p class="lead">
                    <?php
                      $sql = "SELECT user_email FROM tb_user WHERE user_role=2";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_array($result)) {
                      echo $row["user_email"];
                      }
                      } else {
                      echo "0 results";
                      }

                      ?>
                    </p>
                  </a>
                </div>
                <div class="col-md-4 col-sm-12">
                  <h4 class="h4"><i class="fas fa-phone mr-3"></i>Nomor Telepon</h4>
                  <p class="lead">
                  <?php
                     $sql = "SELECT profile_phone FROM tb_lecturer_profile";
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_array($result)) {
                     echo $row["profile_phone"];
                     }
                     } else {
                     echo "0 results";
                     }
                     ?>
                  </p>
                </div>
                <div class="col-md-4 col-sm-12">
                  <h4 class="h4"><i class="fas fa-globe-americas mr-3"></i>Website</h4>
                  <a href="#" target="_blank"><p class="lead">
                  <?php
                    $sql = "SELECT profile_blog FROM tb_lecturer_profile";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_array($result)) {
                   echo $row["profile_blog"];
                   }
                  } else {
                  echo "0 results";
                   }
                  ?>

                  </p></a>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-4 col-sm-12">
                  <h4 class="h4"><i class="fas fa-building mr-3"></i>Alamat Kantor</h4>
                  <p class="lead">
                  <?php
                   $sql = "SELECT profile_office FROM tb_lecturer_profile";
                   $result = mysqli_query($conn, $sql);

                   if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                   while($row = mysqli_fetch_array($result)) {
                   echo $row["profile_office"];
                   }
                   } else {
                   echo "0 results";
                   }
                   ?>

                  </p>
                </div>
                <div class="col-md-8 col-sm-12">
                  <h4 class="h4"><i class="fas fa-home mr-3"></i>Alamat Rumah</h4>
                  <p class="lead">
                  <?php
                    $sql = "SELECT profile_address FROM tb_lecturer_profile";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_array($result)) {
                    echo $row["profile_address"];
                    }
                    } else {
                    echo "0 results";
                     }
                   ?>
                  </p>
                </div>
              </div>
            </div>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!--/.Panel 1-->

      <!--Panel 2-->
      <div class="tab-pane fade" id="panel12" role="tabpanel">
        <br>

        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-md-10">
            <div class="jumbotron">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <p>Kuliah  Libur</p>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->
        </div>
      </div>
      <!--/.Panel 2-->

      <!--Panel 3-->
      <div class="tab-pane fade" id="panel13" role="tabpanel">
        <br>

        <div class="row d-flex justify-content-center">
          <div class="col-md-10">

            <!-- Table with panel -->
                <div class="card card-cascade narrower">

                <!--Card image-->
                <div class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-center align-items-center">

                <a href="" class="white-text mx-3">Kelas yang diampu</a>

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
                                <a>No.</a>
                            </th>
                            <th class="th-md">
                                <a href="">Nama Kelas</a>
                            </th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->


                    <!-- Gan yang ini belum tak bikin data di dbnya e, baru text. ntr dikampus ya tak masukin dbnya-->
                    <tbody>
                        <tr>
                            <td>Senin</td>
                            <td>07.00-08.40</td>
                            <td>Pemrograman Web Lanjut</td>
                            <td>PWL-3</td>
                            <td>04.02.02</td>
                        </tr>
                        <tr>
                            <td>Senin</td>
                            <td>13.20-15.00</td>
                            <td>Pemrograman Web Lanjut</td>
                            <td>PWL-4</td>
                            <td>04.04.02</td>
                        </tr>
                        <tr>
                            <td>Rabu</td>
                            <td>07.00-08.40</td>
                            <td>Praktikum Pemrograman Web Lanjut</td>
                            <td>PWL-4</td>
                            <td>L.2.4.6</td>
                        </tr>
                        <tr>
                            <td>Kamis</td>
                            <td>07.00-08.40</td>
                            <td>Pemrograman Basis Data</td>
                            <td>PBD-2</td>
                            <td>05.05.02</td>
                        </tr>
                    </tbody>
                    <!--Table body-->
                    </table>
                    <!--Table-->
                </div>

                </div>

                </div>
                <!-- Table with panel -->

          </div>
        </div>

      </div>
      <!--/.Panel 3-->

    </div>

  </section>
  <!--Section: Tabs-->

</div>

</main>
<!--Main Layout-->