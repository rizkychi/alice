<?php
    require_once 'config/conf.php';
    $materi_id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tb_material JOIN tb_course ON tb_material.material_course = tb_course.course_id JOIN tb_user ON tb_user.user_id=tb_material.material_user WHERE tb_material.material_id='$materi_id'");        
    $row=mysqli_fetch_assoc($query);
    $role = $_SESSION['role'];
?>

<div class="container">
    <!-- News jumbotron -->
    <div class="col-md-11 jumbotron text-center hoverable p-0 mt-5 row mx-auto">
        <div class="col-md-4 p-0 align-self-stretch" style="background-image:url(img/cover.jpg);
                    background-size: 100% 100%; background-repeat:no-repeat;background-position: center;">
            
        </div>
        <div class="col-md-8 text-md-left p-5">
        

            <!-- Excerpt -->
            <div class="row d-flex justify-content-between px-3">
                <a href="#!" class="green-text">
                    <h6 class="h6 pb-1"><i class="fas fa-layer-group mr-2"></i> <?php echo $row['course_name']?></h6>
                </a>
                <h6 class="h6 pb-1"><i class="far fa-calendar mr-2"></i><?php echo date('d-m-Y', strtotime($row['material_date'])) ?></h6>
            </div>
            <h4 class="h4 mb-4"><?php echo $row['material_subject'] ?></h4>
            <p class="font-weight-normal"><?php echo $row['material_content'] ?></p>
            <p class="font-weight-normal">by <a href="?p=profile&id=<?php echo $row['material_user']?>" class="text-secondary"><strong><?php echo $row['user_name'] ?></strong></a><i class="fas fa-download ml-3"></i>
            <?php 
                $data = mysqli_query($conn, "SELECT * FROM tb_material_downloaded JOIN tb_material ON tb_material.material_id = tb_material_downloaded.material_id");
                while ($result = mysqli_fetch_assoc($data)){echo count($result); }?></p>
            <a href="#" class="btn btn-success">UNDUH</a>
            <?php
            if ( $role == 2) {                            
                echo "<a href='#' class='btn btn-warning'>EDIT</a>";
                echo "<a href='action/delete_materi.php?materi_id=$row[material_id]' class='btn btn-danger'>HAPUS</a>";
            }
            ?>
        </div>
    </div>
    <!-- Grid row -->
</div>
<!-- News jumbotron -->
</div>