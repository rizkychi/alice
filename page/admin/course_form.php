<?php
    if (isset($_GET['act'])){
        $act = $_GET['act'];
    } else {
        header('Location: ?p=admin&v=course');
    }

    if ($act == 'add') {
        $id     = '';
        $name   = '';
        $sks    = '';
        $button = 'Tambah';
    } else if ($act == 'update') {
        if (isset($_GET['id'])) {
            $id     = $_GET['id'];
            $query  = mysqli_query($conn, "SELECT * FROM tb_course WHERE course_id = $id");
            $result = mysqli_fetch_array($query);
            $name   = $result[1];
            $sks    = $result[2];
            $button = 'Ubah';
        }
    }
?>

<form action="action/_course.php?act=<?php echo $act; ?>" method="post">
    <!-- Body -->
    <!-- Material input -->
    <div class="mb-3">
        <input type="text" id="postTitle" name="courseName" placeholder="Tulis nama mata kuliah..." value="<?php echo $name;?>" class="form-control" required>
    </div>
    <!--Blue select-->
    <select class="mdb-select mt-3 w-25" name="courseSKS" searchable="Pilih jumlah SKS" required>
        <option value="1" disabled <?php if ($act == 'add') echo 'selected'; ?>>Pilih jumlah SKS</option>
        <option value="2" <?php if ($act == 'update' && $sks = 2) echo 'selected'; ?>>2 SKS</option>
        <option value="4" <?php if ($act == 'update' && $sks = 4) echo 'selected'; ?>>4 SKS</option>
    </select>
    <input type="text" name="courseID" value="<?php echo $id; ?>" hidden>
    <!-- Body -->
    <div class="float-right mt-2">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-sm btn-success"><?php echo $button; ?></button>
    </div>
</form>