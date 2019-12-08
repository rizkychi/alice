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
        $button = 'TAMBAH';
        $title  = 'Unggah Materi Baru';
    } 
    else if ($act == 'update') {
        if (isset($_GET['id'])) {
            $id     = $_GET['id'];
            $query  = mysqli_query($conn, "SELECT * FROM tb_material WHERE post_id = $id");
            $result = mysqli_fetch_array($query);
            $user   = $result['material_user'];
            $subject= $result['material_subject'];
            $content= $result['material_content'];
            $course = $result['material_course'];
            $button = 'Edit';
            $title  = 'Edit Materi';
        }
    }


?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="jumbotron">
                <h2 class="display-6"><?php echo $title; ?></h2>
                <hr class="my-4">
                <form action="action/add_materi.php?act=<?php echo $act; ?>" method="post">
                <!-- Body -->
                    <!-- User -->
                    <div class="md-form">
                        <input type="text" id="materiFormUser" name="materiUser" value="<?php echo $user;?>" class="form-control" disabled>
                        <label for="materiFormUser">John Doe<?php echo $user;?></label> <!-- hmmm coba  -->
                    </div>
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="materiFormTitle" name="materiName" value="<?php echo $subject;?>" class="form-control" required>
                        <label for="materiFormTitle">Judul Materi</label>
                    </div>
                    <!--Message-->
                    <div class="md-form">
                        <textarea id="materiFormContent" name="materiContent" class="form-control md-textarea" rows="3" required><?php echo $content; ?></textarea>
                        <label for="materiFormContent">Deskripsi Materi</label>
                    </div>
                    <!--Material Course select-->
                    <select class="mdb-select mt-3 w-50" name="course" searchable="Cari Mata Kuliah" required>
                        <option value="0" disabled <?php if ($act == 'add') echo 'selected'; ?>>Pilih Mata Kuliah</option>
                        <?php
                            $query  = mysqli_query($conn, "SELECT * FROM tb_course");
                            while ($row=mysqli_fetch_assoc($query)) {
                                echo "<option value = '$row[course_id]'>$row[course_name]</option>";
                            }
                        ?>
                    </select>
                    <!-- Upload Material -->
                    <div class="md-form">
                        <input type="file" id="materiFormUpload" name="materiUpload" value="<?php echo $subject;?>" class="form-control" required>
                        
                    </div>
                    <!-- Body -->
                    <div class="float-right mt-4">
                        <a href="?p=materi"><button type="button" class="btn btn-md btn-danger">Batal</button></a>
                        <button type="submit" class="btn btn-md btn-success"><?php echo $button; ?></button>
                    </div>
                </form>
                <div class="m-5"></div>
            </div>      
        </div>
    </div>
</div>
