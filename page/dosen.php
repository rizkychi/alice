<?php

require_once 'config/conf.php';

?>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 text-center">
            <h3 class="h3">Dosen</h3>
            <p class="mt-2">Sebagai sekolah tinggi di bidang informatika, proses belajar-mengajar di UNIVERSITAS AMIKOM didukung oleh tenaga pengajar yang berkualitas.</p>
            <!-- Search form -->
            <form class="w-50 md-form form-inline active-purple-3 active-purple-4 mx-auto" action="dosen.php" method="get">
                <input class="form-control w-100" type="text" name="cari" placeholder="Cari dosen" aria-label="Search">
            </form>
            <!-- Search form -->
        </div>
    </div>
    <div class="row mt-4">
        <!-- Dosen Thumbnail -->

        <?php
            $sql = "SELECT user_id, user_name, profile_status FROM tb_user JOIN tb_lecturer_profile ON tb_user.user_id = tb_lecturer_profile.profile_user WHERE user_role=2 && user_verified = 1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="col-sm-12 col-md-4 col-xl-3 mb-4">
                        <div class="card">
                            <div class="card-body p-2 d-flex">
                                <div class="flex-shrink-1 mr-2">
                                    <img src="img/alice-img/avatar.png" class="img-fluid rounded-circle alice-avatar" alt="Avatar">
                                </div>
                                <div class="w-75">
                                    <div class="row m-0">
                                    <?php
                                        echo "<a href='?p=profile&id=$row[0]' class='w-100 stretched-link text-secondary text-truncate' style='line-height:1.1;'>";
                                        echo $row[1];
                                        echo "</a>";
                                        echo "<span class='badge badge-pill badge-success mt-1'>$row[2]</span>";
                                                       
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            } 
        } else {
            echo "0 Result";
        }
        ?>
        <!-- ./Dosen Thumbnail -->
    </div>
</div>