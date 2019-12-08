<?php
    $query  = mysqli_query($conn, 'SELECT * FROM tb_course');
?>
<!-- Main layout -->
  <main>
    <div class="container-fluid">
      <!-- Section: Main panel -->
      <section class="mt-md-4 pt-md-2 mb-5 pb-4">
        <!-- Card -->
        <div class="card card-cascade narrower">
          <!-- Section: Chart -->
          <section>
            <!-- Grid row -->
            <div class="row justify-content-between">
                <!-- Grid column -->
                <div class="col-xl-5 col-lg-12 mr-0 pb-2">
                    <!-- Card image -->
                    <div class="view view-cascade gradient-card-header purple-gradient">
                    <h2 class="h2-responsive mb-0 font-weight-500">Mata Kuliah</h2>
                    </div>
                </div>
                <!-- Grid column -->
                <div class="col-md-2 mt-3 mb-3">
                    <a href="?p=admin&v=course-form&act=add"><button class="btn btn-success" type="button">Tambah</button></a>
                </div>
            </div>
            <!-- Grid row -->
          </section>
          <!-- Section: Chart -->

          <!-- Section: Table -->
          <section>
            <div class="card card-cascade narrower z-depth-0">
              <div class="view view-cascade gradient-card-header bg-secondary narrower py-2 mx-4 mb-3 d-flex justify-content-center align-items-center">
                <a href="" class="white-text mx-3">Daftar Mata Kuliah</a>
              </div>
              <div class="px-4">
                <div class="table-responsive p-2">
                  <!--Table-->
                  <table id="dataTableCourse" class="table table-hover mb-0">
                    <!-- Table head -->
                    <thead>
                      <tr>
                        <th class="th-lg" style="width:15px;min-width:15px;"><a>No.</a></th>
                        <th class="th-lg"><a>Nama Mata Kuliah</a></th>
                        <th class="th-lg"><a>Jumlah SKS</a></th>
                        <th class="th-lg"><a>Aksi</a></th>
                      </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                      <?php
                        $i = 1;
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$data[1]</td>";
                            echo "<td>$data[2]</td>";
                            echo "<td>";
                            echo "<a href='?p=admin&v=course-form&act=update&id=$data[0]'><span class='badge badge-lg badge-primary'>UBAH</span></a>";
                            echo "<a href='action/_course.php?act=delete&id=$data[0]' class='ml-2'><span class='badge badge-danger '>HAPUS</span></a>";
                            echo "</td>";
                            echo "</tr>";
                            $i++;
                        }
                      ?>
                    </tbody>
                    <!-- Table body -->

                  </table>
                  <!-- Table -->

                </div>

              </div>

            </div>

          </section>
          <!--Section: Table-->

        </div>
        <!-- Card -->

      </section>
      <!-- Section: Main panel -->


    </div>

  </main>
  <!-- Main layout -->

<!-- DataTables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>
<!-- DataTables Select  -->
<script type="text/javascript" src="js/addons/datatables-select.min.js"></script>
<script>
    $('#dataTableCourse').DataTable({
        columnDefs: [{
            orderable: false,
            targets: 3
        }]
    });
    $('.dataTables_length').addClass('bs-select');
    $('.dataTables_wrapper').css("padding","10px");
</script>