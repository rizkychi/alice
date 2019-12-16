<?php
    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];
       // $query  = mysqli_query($conn, "SELECT * FROM tb_forum_post WHERE postID = $id");
       $query  = mysqli_query($conn, "SELECT post_course, post_user, post_subject, post_content, post_date FROM tb_forum_post JOIN tb_course ON tb_forum_post.post_course = tb_course.course_id WHERE post_id = '$post_id'");
            $result = mysqli_fetch_array($query);
            $user_id = $result['post_user'];
            $subject= $result['post_subject'];
            $content= $result['post_content'];
            $course = $result['post_course'];
            $post_date = $result['post_date'];
    }    
?>

<!-- comment -->
<?php
    // if (isset($_GET['act'])){
    //     $act = $_GET['act'];
    // } else {
    //     //die();
    // }

    // if ($act == 'add') {
    //     $id     = '';
    //     $user   = $_SESSION['user'];
    //     $comments = '';
    //     $button = 'Post';
    // } else if ($act == 'update') {
    //     if (isset($_GET['comment_id'])) {
    //         $id     = $_GET['comment_id'];
    //         $query  = mysqli_query($conn, "SELECT * FROM tb_forum_comment WHERE comment_id = $id");
    //         $result = mysqli_fetch_array($query);
    //         $user   = $result['comment_user'];
    //         $button = 'Post';
    //     }
    // }


?>


<!-- Main news -->
<div class="col-xl-12 col-md-12">
    <!-- Post -->
    <div class="row mt-2 mb-5 pb-3 mx-2">
        <!-- Card -->
        <div class="card card-body mb-5">
            <div class="post-data mb-4">
                <div class="row justify-content-between">
                    <div class="col-md-4 mb-3">
                        <p class="font-small dark-grey-text mb-1">
                            <strong>Penulis:</strong><?php echo $user_id; ?></p>
                        <p class="font-small grey-text">
                        <?php echo $post_date; ?> </p>
                        <a>
                            <span class="badge badge-danger"><?php echo $course; ?></span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <!-- Basic dropdown -->
                        <a id="alice=dropdown" class="dropdown-toggle float-right m-0 alice-dropdown" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h" style="font-size:20px;"></i></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alice-dropdown">
                            <a class="dropdown-item" href="#">Ubah</a>
                            <a class="dropdown-item" href="#">Hapus</a>
                        </div>
                        <!-- Basic dropdown -->
                    </div>
                </div>
            </div>
            <!-- Title -->
            <h2 class="font-weight-bold">
            <strong><?php echo $subject; ?></strong>
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
                <p class="dark-grey-text article"><?php echo $content; ?></p>
            
            </div>
            <!-- Grid row -->
            <hr>

            <div class="row px-4">
                <h4>Komentar</h4>
                <form action="action/_forumcomment.php?act=add" method="post" class="col-md-12">
                    <div class="form-group purple-border mt-2 mb-1">
                        <textarea class="form-control" name="comments" rows="3" placeholder="Tulis komentar..." required></textarea>
                    </div>
                    <input class="btn btn-secondary btn-sm mx-0 my-1" type="submit" value="Kirim">
                </form>
            </div>
            <hr>

            <?php
                for ($i=0; $i < 2; $i++) { 
                    ?>
                        <div class="row px-4">
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
                        </div>

                        <hr>
                    <?php
                }    
            ?>
        </div>
    </div>
</div>
<!-- Main news -->