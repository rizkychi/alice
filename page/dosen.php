<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 text-center">
            <h3 class="h3">Dosen</h3>
            <p class="mt-2">Sebagai sekolah tinggi di bidang informatika, proses belajar-mengajar di UNIVERSITAS AMIKOM didukung oleh tenaga pengajar yang berkualitas.</p>
            <div class="col-md-6 input-group form-sm form-1 pl-0 mx-auto">
                <div class="input-group-prepend">
                    <span class="input-group-text purple lighten-3" id="basic-text1">
                        <i class="fas fa-search text-white" aria-hidden="true"></i>
                    </span>
                </div>
                <input class="form-control my-0 py-1" type="text" placeholder="Cari dosen" aria-label="Search">
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <!-- Dosen Thumbnail -->
        <?php
            for ($i=0; $i < 9; $i++) { 
                ?>
                    <div class="col-sm-12 col-md-4 col-xl-3 mb-4">
                        <div class="card">
                            <div class="card-body p-2 d-flex">
                                <div class="flex-shrink-1 mr-2">
                                    <img src="img/alice-img/avatar.png" class="img-fluid rounded-circle alice-avatar" alt="Avatar">
                                </div>
                                <div class="w-75">
                                    <div class="row m-0">
                                        <a href="?p=profile" class="w-100 stretched-link text-secondary text-truncate" style="line-height:1.1;">Dosen, S.Kom., M.Kom</a>
                                        <span class="badge badge-pill badge-success mt-1">Selo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
        <!-- ./Dosen Thumbnail -->
    </div>
</div>