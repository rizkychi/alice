<?php
    if (isset($_GET['u'])) {
        if ($_GET['u'] == 'lecturer') {
            $user = 'dosen';
        } else {
            $user = 'mahasiswa';
        }
    } else {
        header("Location: http://$host$uri/index.php");
    }
?>
<body class="coworking-page">
<!-- Main navigation -->
<header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg scrolling-navbar navbar-light z-depth-0 white ml-md-4 mr-md-3 smooth-scroll">
    <a class="navbar-brand purple-pastel" href="#">
        <strong><span class="font-weight-bold">A L I C E</span><span
            class="font-weight-bold pink-pastel">.</span></strong>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto text-uppercase smooth-scroll">

        <li class="nav-item">
            <a class="nav-link pt-0-1" href="?p=landing#login" data-offset="100">
            <button type="button" class="btn btn-outline-purple-pastel btn-rounded btn-md z-depth-0 m-0 pt-2">Masuk <i class="fas fa-angle-double-right"></i></button>
            </a>
        </li>
        </ul>
    </div>
    </nav>
    <!-- Navbar -->


    <div class="container-fluid">

        <div class="row d-flex justify-content-center h-100 mx-md-5">

        <div class="col-lg-4 col-xl-5 col-flex mt-lg-0 pt-3">

            <!-- Material form register -->
            <div class="card">

            <h5 class="card-header purple-gradient white-text text-center py-4 font-weight-bold">
                <strong>Daftar Akun <?php echo ucwords($user); ?></strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form id="regForm-alice" class="text-left" style="color: #757575;" method="POST" action="action/do_register.php">
                   
                    <div class="row">
                        <div class="col">
                            <!-- NIM -->
                            <div class="md-form">
                                <input type="text" id="nim" name="id" class="form-control">
                                <label for="nim">NIM</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Name -->
                            <div class="md-form">
                                <input type="text" id="fname" name="fname" class="form-control">
                                <label for="fname">Nama Lengkap</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- Email -->
                            <div class="md-form mt-2">
                                <input type="email" id="email" name="email" class="form-control">
                                <label for="email">E-mail</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- Password -->
                            <div class="md-form mt-2">
                                <input type="password" id="password" name="password" class="form-control">
                                <label for="password">Kata Sandi</label>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-4 align-self-center">
                            <!-- Default inline 1-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="rdbGender1" name="gender" value="Laki-laki">
                                <label class="custom-control-label" for="rdbGender1">Laki-laki</label>
                            </div>
                        </div>

                        <div class="col-md-4 align-self-center pl-xl-0">
                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="rdbGender2" name="gender" value="Perempuan">
                                <label class="custom-control-label" for="rdbGender2">Perempuan</label>
                            </div>
                        </div>

                        <div class="col-md-4 mt-sm-3">
                            <!-- Name -->
                            <div class="md-form mt-2">
                                <input type="text" id="date-picker" class="form-control datepicker" name="date">
                                <label for="date-picker">Tanggal Lahir</label>
                            </div>
                        </div>
                    </div>
                    
                    <input name="userRole" value="<?php echo $user;?>" hidden>
                    
                    <div class="row justify-content-center">
                        <button type="submit" name="daftar" class="btn purple-gradient font-weight-bold">Daftar</button>
                    </div>


                    <hr>

                    <!-- Terms of service -->
                    <p>Sudah punya akun? Masuk 
                        <a href="?p=landing#login">disini.</a>

                </form>
                <!-- Form -->

            </div>

            </div>
            <!-- Material form register -->

        </div>

        <div class="col-lg-8 col-xl-7 pt-lg-4">

            <div class="view">
            <img src="https://mdbootstrap.com/img/illustrations/graphics(2).png" class="img-fluid" alt="smaple image">
            </div>

        </div>

        </div>

    </div>
    <!-- Intro -->

</header>