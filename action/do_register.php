<?php
require_once '../config/conf.php';

mysqli_select_db($conn,$db_name);

if ($_POST){
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $fname = $_POST['fname'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    

    if ($_POST['userRole']=='mahasiswa'){
        $role = 3;
    } else if ($_POST['userRole']=='dosen'){
        $role = 2;
    } 

    $sql = " INSERT INTO tb_user (user_id, user_email, user_password, user_name, user_dob , user_gender,user_role) 
    VALUES ('$id','$email',md5('$pass'),'$fname','$date','$gender','$role')";
    
    $simpan = mysqli_query($conn,$sql);
    if ($simpan) {
        header('location: ../index.php');
    } else { echo "GUAGAL COY"; } 

    echo "<br>".$sql;
    
}
?>