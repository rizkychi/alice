<?php
    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];
    }    
?>
<!-- Main news -->
<div class="col-xl-12 col-md-12">
    <!-- Post -->
    <div class="row mt-2 mb-5 pb-3 mx-2">
        <!-- Card -->
        <div class="card card-body mb-5">
            <div class="post-data mb-4">
                <p class="font-small dark-grey-text mb-1">
                    <strong>Penulis:</strong> Anna Doe</p>
                <p class="font-small grey-text">
                    15/09/2017 pada 4:03 pm</p>
                <a>
                    <span class="badge badge-danger">Mata Kuliah</span>
                </a>
            </div>
            <!-- Title -->
            <h2 class="font-weight-bold">
            <strong>This is title of the news</strong>
            </h2>
            <hr class="red title-hr">
            <!-- Title -->
            
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-8 mt-2">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold dark-grey-text">
                                <i class="far fa-lg fa-newspaper mr-2 dark-grey-text"></i>
                                <strong>147</strong> Dibaca
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold dark-grey-text">
                                <i class="far fa-lg fa-comment-alt mr-2 dark-grey-text"></i>
                                <strong>14</strong> Komentar
                            </h6>
                        </div>
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 d-flex justify-content-end">
                    <!-- like dislike (not yet implemented) -->
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->

            <hr>

            <!-- Grid row -->
            <div class="row mx-md-4 px-4 mt-3">
                <p class="dark-grey-text article">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            
            </div>
            <!-- Grid row -->
            <hr>

            <h4>Komentar</h4>

            <form action="" method="post" class="col-md-12">
                <div class="form-group purple-border mt-2 mb-1">
                    <textarea class="form-control" name="comments" rows="3" placeholder="Tulis komentar..."></textarea>
                </div>
                <input class="btn btn-secondary btn-sm mx-0 my-1" type="submit" value="Kirim">
            </form>

            <hr>

            <?php
                for ($i=0; $i < 2; $i++) { 
                    ?>
                        <!-- Comments -->
                        <div class="d-flex p-2 align-items-start">
                            <div class="flex-shrink-1 mr-3">
                                <div class="view overlay">
                                    <img src="img/alice-img/avatar.png" class="rounded-circle img-fluid alice-avatar"
                                        alt="Avatar">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="w-100">
                                <h6 class="h6 mb-0">Nama orang
                                    <span class="text-black-50 ml-2 font-small">04/04/2017</span>
                                </h6>
                                <p class="dark-grey-text article">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. </p>
                            </div>
                        </div>
                        <!-- Comments -->
                        <hr>
                    <?php
                }    
            ?>
        </div>
    </div>
</div>
<!-- Main news -->