<?php
    $uid = $_SESSION['user'];

    $status          = mysqli_fetch_array(mysqli_query($conn, "SELECT profile_status FROM tb_lecturer_profile WHERE profile_user = '$uid'"))[0];
    $profile         = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = '$uid'"));  
    $assignment      = mysqli_query($conn, "SELECT * FROM tb_class_assignment WHERE assignment_user = '$uid'");
    $recent_post     = mysqli_query($conn, "SELECT post_id, post_subject, post_view, (SELECT COUNT(*) FROM tb_forum_comment WHERE comment_post = post_id) AS post_comment FROM tb_forum_post WHERE post_user = '$uid' ORDER BY post_date DESC");
    $recent_material = mysqli_query($conn, "SELECT material_id, material_subject, (SELECT COUNT(*) FROM tb_material_downloaded WHERE tb_material_downloaded.material_id = tb_material.material_id) AS material_download FROM tb_material WHERE material_user = '$uid' ORDER BY material_date DESC");
    
    // put modal if failed join
    if (isset($_SESSION['errorJoinClass']) && $_SESSION['errorJoinClass']) {
      echo    "<script>
                  $(document).ready(function() {
                      $('#modalJoinFail').modal('show');
                  });
              </script>";
      unset($_SESSION['errorJoinClass']);
    }

    //form
    if ($_POST) {
      if ($role == 2) {
        $getStatus = $_POST['userStatus'];
        $query     = mysqli_query($conn, "UPDATE tb_lecturer_profile SET profile_status = '$getStatus' WHERE profile_user = '$uid'");
        echo "<meta http-equiv='refresh' content='0'>";
      }
    }
?>

<!-- DataTables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>
<!-- DataTables Select  -->
<script type="text/javascript" src="js/addons/datatables-select.min.js"></script>

<?php
  if ($role == 2) {  
?>
<!-- Main layout Lecturer-->

<main>

  <div class="container">

    <!-- Section: data tables -->
    <section class="mt-md-4 pb-3">

      <div class="row">

        <div class="col-xl-4 col-md-6">

          <div class="card mb-4">
            <div class="card-body">
              <h5 class="h5-responsive my-2">Status</h5>
              <hr class="purple">
              <form action="" method="post">
                <!-- Blue select -->
                <select class="mdb-select mt-2" id="userFormStatus" name="userStatus" required>
                    <option value="1" disabled>Pilih Status Mengajar</option>
                    <option value="Selo" <?php if ($status == 'Selo') echo 'selected'; ?>>Selo</option>
                    <option value="Mengajar" <?php if ($status == 'Mengajar') echo 'selected'; ?>>Mengajar</option>
                    <option value="Rapat" <?php if ($status == 'Rapat') echo 'selected'; ?>>Rapat</option>
                    <option value="di Rumah" <?php if ($status == 'di Rumah') echo 'selected'; ?>>di Rumah</option>
                </select>
                <div class="float-right">
                  <input type="submit" value="Perbarui" class="btn btn-secondary btn-rounded btn-sm z-depth-1">
                </div>
              </form>
            </div>
          </div>

          <div class="card mb-md-0 mb-4">
            <div class="card-body">
              <h5 class="h5-responsive my-2">Tugas</h5>
              <hr class="purple">
              <div class="list-group list-panel">
                <?php 
                  if (mysqli_num_rows($assignment) > 0) {
                      while ($result = mysqli_fetch_array($assignment)) {
                          ?>
                            <a href="?p=admin&v=user-form&act=update&id=<?php echo $result['user_id']; ?>" class="list-group-item d-flex justify-content-between dark-grey-text"><?php echo $result['user_name']; ?>
                              <i class="fas fa-external-link-alt ml-1" data-toggle="tooltip" data-placement="top"
                                title="Klik untuk melihat"></i>
                            </a>
                          <?php
                      }
                  } else {
                      echo "<p class='font-weight-light font-italic text-center my-5' style='line-height: 0.9;'>Woohooo tidak ada tugas</p>";
                  }
                ?>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8 col-md-6">
          <div class="row">
              <div class="col-md-12">
                <a href="?p=class-form&act=add" class="btn purple-gradient btn-rounded waves-effect font-weight-bold btn-dash float-right">
                    Buat Kelas 
                </a>
                <a href="?p=forum-form&act=add" class="btn purple-gradient btn-rounded waves-effect font-weight-bold btn-dash float-right">
                    Tulis Post 
                </a>
                <a href="?p=materi-form" class="btn purple-gradient btn-rounded waves-effect font-weight-bold btn-dash float-right">
                    Unggah Materi
                </a>
              </div>
          </div>

          <div class="card my-4">
            <div class="card-body">
              <div class="table-responsive p-2">
                <table id="dataTablePost" class="table table-fixed mb-0">
                  <thead>
                    <tr style="display: none;">
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($result = mysqli_fetch_array($recent_post)){
                            echo "<tr>";
                            echo "<td><a href='?p=forum&id=$result[post_id]'>$result[post_subject]</a></td>";
                            echo "<td style='width:150px;'><i class='far fa-comment mr-2'></i>$result[post_view]</td>";
                            echo "<td style='width:150px;'><i class='far fa-eye mr-2'></i>$result[post_comment]</td>";
                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
              <a href="?p=forum" class="btn btn btn-flat grey lighten-3 btn-rounded waves-effect float-right font-weight-bold  btn-dash" style="margin-top: -2rem;">
                  Lihat post lainnya
              </a>
            </div>
          </div>

          <div class="card my-4">
            <div class="card-body">
              <div class="table-responsive p-2">
                <table id="dataTableMaterial" class="table table-fixed mb-0">
                  <thead>
                    <tr style="display: none;">
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($result = mysqli_fetch_array($recent_material)){
                            echo "<tr>";
                            echo "<td><a href='?p=forum&id=$result[material_id]'>$result[material_subject]</a></td>";
                            echo "<td style='width:150px;'><i class='far fa-comment mr-2'></i>$result[material_download]</td>";
                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
              <a href="?p=materi" class="btn btn btn-flat grey lighten-3 btn-rounded waves-effect float-right font-weight-bold  btn-dash" style="margin-top: -2rem;">
                  Lihat materi lainnya
              </a>
            </div>
          </div>

        </div>

      </div>

    </section>
    <!-- Section: data tables -->

  </div>

</main>
<!-- Main layout -->
<?php
  } else if ($role == 3) {
?>
<!-- Main layout Students-->
<main>

  <div class="container">

    <!-- Section: data tables -->
    <section class="mt-md-4 pb-3">

      <div class="row">

        <div class="col-xl-4 col-md-6">

          <div class="card mb-4">
            <div class="card-body row justify-content-center">
              <div class="col-md-4">
                  <img src="img/reward.png" alt="reward" class="img-fluid">
              </div>
              <div class="col-md-12">
                  <h5 class="h5-responsive my-2 text-center"><?php fn_title($conn, $uid); ?></h5>
                  <?php
                      $exp = $profile['user_exp'];
                      if ($exp <= 0) { 
                          $min = 0;
                          $max = 300;
                      } else if ($exp <= 300) {
                          $min = 0;
                          $max = 300;
                      } else if ($exp <= 1000) {
                          $min = 300;
                          $max = 1000;
                      } else if ($exp <= 2200) {
                          $min = 1000;
                          $max = 2200;
                      } else if ($exp <= 4000) {
                          $min = 2200;
                          $max = 4000;
                      } else {
                          $min = 4000;
                          $max = 9999;
                          $exp = 9999;
                      } 
                      $bar_percent = (float)(($exp-$min)/($max-$min)*100);
                  ?>
                  <p class="font-weight-light font-italic text-center" style="line-height: 0.9;"><?php echo $profile['user_exp'];?> exp <br><span style="font-size: 12px;">(selanjutnya: <?php echo $max;?>)</span></p>
                  <div class="progress md-progress mt-4">
                      <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $bar_percent;?>%" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div>
            </div>
          </div>

          <div class="card mb-md-0 mb-4">
            <div class="card-body">
              <h5 class="h5-responsive my-2">Tugas</h5>
              <hr class="purple">
              <div class="list-group list-panel">
                <?php 
                  if (mysqli_num_rows($assignment) > 0) {
                      while ($result = mysqli_fetch_array($assignment)) {
                          ?>
                            <a href="?p=admin&v=user-form&act=update&id=<?php echo $result['user_id']; ?>" class="list-group-item d-flex justify-content-between dark-grey-text"><?php echo $result['user_name']; ?>
                              <i class="fas fa-external-link-alt ml-1" data-toggle="tooltip" data-placement="top"
                                title="Klik untuk melihat"></i>
                            </a>
                          <?php
                      }
                  } else {
                      echo "<p class='font-weight-light font-italic text-center my-5' style='line-height: 0.9;'>Woohooo tidak ada tugas</p>";
                  }
                ?>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8 col-md-6">
          <div class="row">
              <div class="col-md-12">
                  <a data-toggle="modal" data-target="#modalJoinClass" class="btn purple-gradient btn-rounded waves-effect font-weight-bold btn-dash float-right">
                      Gabung Kelas    
                  </a>
                  <a href="?p=forum-form&act=add" class="btn purple-gradient btn-rounded waves-effect font-weight-bold btn-dash float-right">
                      Tulis Post 
                  </a>
              </div>
          </div>
          <div class="card my-4">
            <div class="card-body">
              <div class="table-responsive p-2">
                <table id="dataTablePost" class="table table-fixed mb-0">
                  <thead>
                    <tr style="display: none;">
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($result = mysqli_fetch_array($recent_post)){
                            echo "<tr>";
                            echo "<td><a href='?p=forum&id=$result[post_id]'>$result[post_subject]</a></td>";
                            echo "<td style='width:150px;'><i class='far fa-comment mr-2'></i>$result[post_view]</td>";
                            echo "<td style='width:150px;'><i class='far fa-eye mr-2'></i>$result[post_comment]</td>";
                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
              <a href="?p=forum" class="btn btn btn-flat grey lighten-3 btn-rounded waves-effect float-right font-weight-bold  btn-dash" style="margin-top: -2rem;">
                  Lihat post lainnya
              </a>
            </div>
          </div>

        </div>

      </div>

    </section>
    <!-- Section: data tables -->

  </div>

</main>
<?php } ?>

<script>
    $('#dataTablePost').DataTable({
        "pagingType" : "simple_numbers",
        "ordering" : false,
        "pageLength" : 5
    });
    $('#dataTableMaterial').DataTable({
        "pagingType" : "simple_numbers",
        "ordering" : false,
        "pageLength" : 5
    });
    $('#dataTablePost_length label').replaceWith("<label>Post Saya</label>");
    $('#dataTableMaterial_length label').replaceWith("<label>Materi Saya</label>");
    $('.dataTables_wrapper').css("padding","10px");
</script>