<?php
    $n_user  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user"));
    $n_post  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_forum_post"));
    $n_mats  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_material"));
    $n_class = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_class"));

    $usr_lect_verif     = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user WHERE user_role = '2' AND user_verified = '1'"));
    $usr_lect_notverif  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user WHERE user_role = '2' AND user_verified = '0'"));
    $usr_stdn_verif     = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user WHERE user_role = '3' AND user_verified = '1'"));
    $usr_stdn_notverif  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user WHERE user_role = '3' AND user_verified = '0'"));

    $query_traffic = mysqli_query($conn, "SELECT DATE_FORMAT(visit_date, '%d/%m') AS day, COUNT(*) AS count FROM tb_visit WHERE visit_date >= NOW() + INTERVAL -7 DAY AND visit_date < NOW() + INTERVAL 0 DAY GROUP BY DAY(visit_date)");
    $traffic = array();
    while ($result = mysqli_fetch_assoc($query_traffic)){
      $traffic[] = $result;
    }
?>
<!-- Main layout -->
<main>

<div class="container">

  <!-- Section: Intro -->
  <section class="mt-md-4 pt-md-2 mb-5 pb-4">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">
            <i class="fas fa-user primary-color mr-3 z-depth-1"></i>
            <div class="data">
              <p class="text-uppercase">Pengguna</p>
              <h4 class="font-weight-bold dark-grey-text"><?php echo $n_user; ?></h4>
            </div>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade pt-2">
            <hr class="mt-0">
            <a href="?p=admin&v=student"><p class="card-text">Lihat semua pengguna<i class="fas fa-angle-right ml-2"></i></p></a>
          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">
            <i class="fas fa-copy warning-color mr-3 z-depth-1"></i>
            <div class="data">
              <p class="text-uppercase">Postingan Forum</p>
              <h4 class="font-weight-bold dark-grey-text"><?php echo $n_post; ?></h4>
            </div>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade pt-2">
            <hr class="mt-0">
            <a href="?p=admin&v=post-forum"><p class="card-text">Lihat semua post<i class="fas fa-angle-right ml-2"></i></p></a>
          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">
            <i class="fas fa-file-archive light-blue lighten-1 mr-3 z-depth-1"></i>
            <div class="data">
              <p class="text-uppercase">Materi</p>
              <h4 class="font-weight-bold dark-grey-text"><?php echo $n_mats; ?></h4>
            </div>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade pt-2">
            <hr class="mt-0">
            <a href="?p=admin&v=post-material"><p class="card-text">Lihat semua materi<i class="fas fa-angle-right ml-2"></i></p></a>
          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-0">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">
            <i class="fas fa-chalkboard-teacher red accent-2 mr-3 z-depth-1"></i>
            <div class="data">
              <p class="text-uppercase">Ruang kelas</p>
              <h4 class="font-weight-bold dark-grey-text"><?php echo $n_class; ?></h4>
            </div>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade pt-2">
            <hr class="mt-0">
            <a href="?p=admin&v=classroom"><p class="card-text">Lihat semua kelas<i class="fas fa-angle-right ml-2"></i></p></a>
          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </section>
  <!-- Section: Intro -->

  <!-- Section: Main panel -->
  <section class="mb-5">

    <!-- Card -->
    <div class="card card-cascade narrower">

      <!-- Section: Chart -->
      <section>

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-xl-5 col-lg-12 mr-0 pb-2">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header light-blue lighten-1">
              <h2 class="h2-responsive mb-0 font-weight-500">Trafik</h2>
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade pb-0">

              <!-- Panel data -->
              <div class="row py-3 pl-4">

                <!-- First column -->
                <div class="col-md-12">

                  <!-- Date select -->
                  <p class="lead"><span class="badge info-color p-2">Jumlah pengguna</span></p>

                  <canvas id="userChart"></canvas>

                  <!-- Date pickers -->
                  <p class="lead pt-3 pb-4"><span class="badge info-color p-2">Custom date</span></p>
                  

                </div>
                <!-- First column -->

              </div>
              <!-- Panel data -->

            </div>
            <!-- Card content -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-7 col-lg-12 mb-4 pb-2">

            <!-- Chart -->
            <div class="view view-cascade gradient-card-header blue-gradient">

              <canvas id="lineChart" height="175"></canvas>

            </div>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Chart -->

      <!-- Section: Table -->
      <section>

        <!-- Top Table UI -->
        <div class="table-ui p-2 mb-3 mx-4 mb-5">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6">

              <!-- Name -->
              <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown">
                <option value="" disabled selected>Bulk actions</option>
                <option value="1">Delate</option>
                <option value="2">Export</option>
                <option value="3">Change segment</option>
              </select>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6">

              <!-- Blue select -->
              <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown">
                <option value="" disabled selected>Show only</option>
                <option value="1">All <span> (2000)</span></option>
                <option value="2">Never opened <span> (200)</span></option>
                <option value="3">Opened but unanswered <span> (1800)</span></option>
                <option value="4">Answered <span> (200)</span></option>
                <option value="5">Unsunscribed <span> (50)</span></option>
              </select>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6">

              <!-- Blue select -->
              <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown">
                <option value="" disabled selected>Filter segments</option>
                <option value="1">Contacts in no segments <span> (100)</span></option>
                <option value="1">Segment 1 <span> (2000)</span></option>
                <option value="2">Segment 2 <span> (1000)</span></option>
                <option value="3">Segment 3 <span> (4000)</span></option>
              </select>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6">

              <form class="form-inline mt-2 ml-2">
                <div class="form-group md-form mt-2">
                  <input class="form-control w-100" type="text" placeholder="Search">
                </div>
                <button class="btn btn-sm btn-primary ml-2 mr-0 mb-md-0 mb-4 px-2"><i
                    class="fas fa-search"></i></button>
              </form>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
        <!-- Top Table UI -->

        <div class="card card-cascade narrower z-depth-0">

          <div
            class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <div>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                  class="fas fa-th-large mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                  class="fas fa-columns mt-0"></i></button>
            </div>

            <a href="" class="white-text mx-3">Table name</a>

            <div>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                  class="fas fa-pencil-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                  class="fas fa-eraser mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                  class="fas fa-info-circle mt-0"></i></button>
            </div>

          </div>

          <div class="px-4">

            <div class="table-responsive">

              <!--Table-->
              <table class="table table-hover mb-0">

                <!-- Table head -->
                <thead>
                  <tr>
                    <th>
                      <input class="form-check-input" type="checkbox" id="checkbox">
                      <label for="checkbox" class="form-check-label mr-2 label-table"></label>
                    </th>
                    <th class="th-lg"><a>First Name <i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Last Name<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Username<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Email<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Country<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>City<i class="fas fa-sort ml-1"></i></a></th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                  <tr>
                    <th scope="row">
                      <input class="form-check-input" type="checkbox" id="checkbox1">
                      <label for="checkbox1" class="label-table"></label>
                    </th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>markotto@gmail.com</td>
                    <td>USA</td>
                    <td>San Francisco</td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <input class="form-check-input" type="checkbox" id="checkbox2">
                      <label for="checkbox2" class="label-table"></label>
                    </th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>jacobt@gmail.com</td>
                    <td>France</td>
                    <td>Paris</td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <input class="form-check-input" type="checkbox" id="checkbox3">
                      <label for="checkbox3" class="label-table"></label>
                    </th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>larrybird@gmail.com</td>
                    <td>Germany</td>
                    <td>Berlin</td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <input class="form-check-input" type="checkbox" id="checkbox4">
                      <label for="checkbox4" class="label-table"></label>
                    </th>
                    <td>Paul</td>
                    <td>Topolski</td>
                    <td>@P_Topolski</td>
                    <td>ptopolski@gmail.com</td>
                    <td>Poland</td>
                    <td>Warsaw</td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <input class="form-check-input" type="checkbox" id="checkbox5">
                      <label for="checkbox5" class="label-table"></label>
                    </th>
                    <td>Anna</td>
                    <td>Doe</td>
                    <td>@andy</td>
                    <td>annadoe@gmail.com</td>
                    <td>Spain</td>
                    <td>Madrid</td>
                  </tr>
                </tbody>
                <!-- Table body -->

              </table>
              <!-- Table -->

            </div>

            <hr class="my-0">

            <!-- Bottom Table UI -->
            <div class="d-flex justify-content-between">

              <!-- Name -->
              <select class="mdb-select colorful-select dropdown-primary md-form hidden-md-down">
                <option value="" disabled>Rows number</option>
                <option value="1" selected>5 rows</option>
                <option value="2">25 rows</option>
                <option value="3">50 rows</option>
                <option value="4">100 rows</option>
              </select>

              <!-- Pagination -->
              <nav class="my-4">
                <ul class="pagination pagination-circle pg-blue mb-0">

                  <!--First-->
                  <li class="page-item disabled clearfix d-none d-md-block"><a class="page-link">First</a></li>

                  <!-- Arrow left -->
                  <li class="page-item disabled">
                    <a class="page-link" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>

                  <!-- Numbers -->
                  <li class="page-item active"><a class="page-link">1</a></li>
                  <li class="page-item"><a class="page-link">2</a></li>
                  <li class="page-item"><a class="page-link">3</a></li>
                  <li class="page-item"><a class="page-link">4</a></li>
                  <li class="page-item"><a class="page-link">5</a></li>

                  <!-- Arrow right -->
                  <li class="page-item">
                    <a class="page-link" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>

                  <!-- First -->
                  <li class="page-item clearfix d-none d-md-block"><a class="page-link">Last</a></li>

                </ul>
              </nav>
              <!-- Pagination -->

            </div>
            <!-- Bottom Table UI -->

          </div>

        </div>

      </section>
      <!--Section: Table-->

    </div>
    <!-- Card -->

  </section>
  <!-- Section: Main panel -->

  <!-- Section: Cascading panels -->
  <section class="mb-5">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

        <!-- Panel -->
        <div class="card">

          <div class="card-header white-text primary-color">
            Things to improve
          </div>

          <div class="card-body text-center px-4 mb-3">
            <div class="list-group list-panel">
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Cras justo odio
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i>
              </a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Dapibus ac facilisi
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i>
              </a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Morbi leo risus
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i>
              </a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Porta ac consectet
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i>
              </a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Vestibulum at eros
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i>
              </a>
            </div>
          </div>

        </div>
        <!-- Panel -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-md-0 mb-4">

        <!-- Panel -->
        <div class="card">

          <div class="card-header white-text primary-color">
            Tasks to do
          </div>

          <div class="card-body text-center px-4 mb-3">
            <div class="list-group list-panel">
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Cras justo odio
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Dapibus ac facilisi
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Morbi leo risus
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Porta ac consectet
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Vestibulum at eros
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
            </div>
          </div>

        </div>
        <!-- Panel -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-0">

        <!-- Panel -->
        <div class="card">

          <div class="card-header white-text primary-color">
            Statistics
          </div>

          <div class="card-body text-center px-4 mb-3">
            <div class="list-group list-panel">
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Cras justo odio
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Dapibus ac facilisi
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Morbi leo risus
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Porta ac consectet
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
              <a href="#" class="list-group-item d-flex justify-content-between dark-grey-text">Vestibulum at eros
                <i class="fas fa-wrench ml-auto" data-toggle="tooltip" data-placement="top"
                  title="Click to fix"></i></a>
            </div>
          </div>

        </div>
        <!-- Panel -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </section>
  <!--Section: Cascading panels-->

  <!-- Section: Classic admin cards -->
  <section class="pb-3">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

        <!-- Card Primary -->
        <div class="card classic-admin-card primary-color">
          <div class="card-body">
            <div class="pull-right">
              <i class="far fa-money-bill-alt"></i>
            </div>
            <p class="white-text">SALES</p>
            <h4 class="check">2000$</h4>
          </div>
          <div class="progress">
            <div class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%" aria-valuenow="25"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="card-body">
            <p>Better than last week (25%)</p>
          </div>
        </div>
        <!-- Card Primary -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

        <!-- Card Yellow -->
        <div class="card classic-admin-card warning-color">
          <div class="card-body">
            <div class="pull-right">
              <i class="fas fa-chart-line"></i>
            </div>
            <p>SUBSCRIPTIONS</p>
            <h4 class="check">200</h4>
          </div>
          <div class="progress">
            <div class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%" aria-valuenow="25"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="card-body">
            <p>Worse than last week (25%)</p>
          </div>
        </div>
        <!-- Card Yellow -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

        <!-- Card Blue -->
        <div class="card classic-admin-card light-blue lighten-1">
          <div class="card-body">
            <div class="pull-right">
              <i class="fas fa-chart-pie"></i>
            </div>
            <p>TRAFFIC</p>
            <h4 class="check">20000</h4>
          </div>
          <div class="progress">
            <div class="progress-bar bg grey darken-4" role="progressbar" style="width: 75%" aria-valuenow="75"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="card-body">
            <p>Better than last week (75%)</p>
          </div>
        </div>
        <!-- Card Blue -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-0">

        <!-- Card Red -->
        <div class="card classic-admin-card red accent-2">
          <div class="card-body">
            <div class="pull-right">
              <i class="fas fa-chart-bar"></i>
            </div>
            <p>ORGANIC TRAFFIC</p>
            <h4 class="check">2000</h4>
          </div>
          <div class="progress">
            <div class="progress-bar bg grey darken-4" role="progressbar" style="width: 25%" aria-valuenow="25"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="card-body">
            <p>Better than last week (25%)</p>
          </div>
        </div>
        <!-- Card Red -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </section>
  <!-- Section: Classic admin cards -->

</div>

</main>
<!-- Main layout -->

<script>
$(document).ready(function(){
    //user chart
    var ctxD = document.getElementById("userChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
        type: 'doughnut',
        data: {
            labels: ["Dosen Sudah Verifikasi", "Dosen Belum Verifikasi", "Mahasiswa Sudah Verifikasi", "Mahasiswa Belum Verifikasi"],
            datasets: [{
                data: [<?php echo "$usr_lect_verif,$usr_lect_notverif,$usr_stdn_verif,$usr_stdn_notverif"; ?>],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5"]
            }]
        },
        options: {
            responsive: true
        }
    });

    //traffic chart
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: [<?php 
                $i = 1;
                foreach ($traffic as $value) {
                  if ($i != 1) echo ",";
                  echo '"'.$value['day'].'"';
                  $i++;
                }
              ?>],
            datasets: [{
            label: "Pengunjung",
            fillColor: "#fff",
            backgroundColor: 'rgba(255, 255, 255, .3)',
            borderColor: 'rgba(255, 255, 255)',
            data: [<?php 
                $i = 1;
                foreach ($traffic as $value) {
                  if ($i != 1) echo ",";
                  echo $value['count'];
                  $i++;
                }
              ?>],
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "#fff",
                }
            },
        scales: {
            xAxes: [{
                gridLines: {
                    display: true,
                    color: "rgba(255,255,255,.25)"
                },
                    ticks: {
                    fontColor: "#fff",
                },
        }],
        yAxes: [{
            display: true,
            gridLines: {
                display: true,
                color: "rgba(255,255,255,.25)"
            },
            ticks: {
                fontColor: "#fff",
            },
        }],
        }
        }
    });
});
</script>