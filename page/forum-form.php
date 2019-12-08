<?php
    if (isset($_GET['act'])){
        $act = $_GET['act'];
    } else {
        die();
    }

    if ($act == 'add') {
        $id     = '';
        $user   = '';
        $subject= '';
        $content= '';
        $course = '';
        $button = 'Post';
    } else if ($act == 'update') {
        if (isset($_GET['id'])) {
            $id     = $_GET['id'];
            $query  = ""; //querymu ea
            $result = mysqli_fetch_array($query);
            $user   = $result['post_user'];
            $subject= $result['post_subject'];
            $content= $result['post_content'];
            $course = $result['post_course'];
            $button = 'Ubah';
        }
    }

    //dynamic course list
    $query = mysqli_query($conn, "SELECT * FROM tb_course");
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="jumbotron">
                <h2 class="display-6">Buat Post </h2>
                <hr class="my-4">
                <!-- PENTING : _course.php diganti nama file action mu -->
                <form action="action/_course.php?act=<?php echo $act; ?>" method="post">
                <!-- Body -->
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="postFormTitle" name="postName" value="<?php echo $subject;?>" class="form-control" required>
                        <label for="postFormTitle">Judul post</label>
                    </div>
                    <!--Message-->
                    <div class="md-form">
                        <textarea id="postFormContent" name="postContent" class="form-control md-textarea" rows="3" required><?php echo $content; ?></textarea>
                        <label for="postFormContent">Isi post</label>
                    </div>
                    <!--Blue select-->
                    <select class="mdb-select mt-3 w-50" name="course" searchable="Cari Mata Kuliah" required>
                        <option value="1" disabled <?php if ($act == 'add') echo 'selected'; ?>>Pilih Mata Kuliah</option>
                        <!-- Dynamic Course List -->
                        <?php
                            while ($result = mysqli_fetch_array($query)) {
                                echo "<option value='$result[0]'";
                                if ($act == 'update' && $sks = 2) 
                                    echo 'selected';
                                echo ">$result[1]</option>";
                            }
                        ?>
                    </select>
                    <input type="text" name="postID" value="<?php echo $id; ?>" hidden>
                    <input type="text" name="postUser" value="<?php echo $user; ?>" hidden>
                    <!-- Body -->
                    <div class="float-right mt-4">
                        <a href="?p=forum"><button type="button" class="btn btn-md btn-danger">Batal</button></a>
                        <button type="submit" class="btn btn-md btn-success"><?php echo $button; ?></button>
                    </div>
                </form>
                <div class="m-5"></div>
            </div>      
        </div>
    </div>
</div>
