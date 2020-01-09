<?php  
  if (isset($_SESSION['login_failed']) && $_SESSION['login_failed']) {
    echo "<script>
              $(document).ready(function() {
                  $('#loginFailModal').modal('show');
              });
          </script>";
    unset($_SESSION['login_failed']);
  }
  
  // put modal if user not verified
  if (isset($_SESSION['user_verified']) && $_SESSION['user_verified'] == 0) {
    echo    "<script>
                $(document).ready(function() {
                    $('#notVerificateModal').modal('show');
                });
            </script>";
    unset($_SESSION['user_verified']);
  }
?>   
<body class="coworking-page">

  <!-- Main navigation -->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg scrolling-navbar navbar-light z-depth-0 fixed-top white ml-md-4 mr-md-3 smooth-scroll">
      <a class="navbar-brand purple-pastel" href="?=landing">
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
            <a class="nav-link heather-color" href="#about" data-offset="100">
              <strong>Tentang</strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link heather-color" href="#offer" data-offset="100">
              <strong>Manfaat</strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link heather-color" href="#articles" data-offset="100">
              <strong>Fitur</strong>
            </a>
          </li>         
          <li class="nav-item">
            <a class="nav-link pt-0-1" href="#login" data-offset="100">
              <button type="button" class="btn btn-outline-purple-pastel btn-rounded btn-md z-depth-0 m-0 pt-2">Masuk <i class="fas fa-angle-double-right"></i></button>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Intro -->
    <section class="view intro">

      <div class="container-fluid">

        <div class="row d-flex justify-content-center align-items-center h-100 mx-md-5">

          <div class="col-lg-4 col-xl-5 col-flex mt-lg-0 pt-lg-4 mt-5 pt-5">

            <h1 class="heading font-weight-bold display-3 mb-4">Hai<span>.</span> <br
                class="d-block d-md-none d-lg-block d-xl-none"><br>Selamat Datang</span></h1>
            <h5 class="subheading mb-xl-4 pb-xl-0 mb-md-3 pb-md-3 mb-4"><strong>Saat ini kamu mengunjungi web e-learning milik Universitas Amikom. 
                <br class="d-none d-xl-block">Bagi kamu mahasiswa aktif Amikom , wajib banget buat gabung disini. Daftarkan diri kamu sekarang</strong></h5>
            <div class="mr-auto">
                <button type="button" class="btn purple-gradient btn-rounded ml-0" data-toggle="modal" data-target="#registerModal">Daftar Sekarang</button>
            </div>

          </div>

          <div class="col-lg-8 col-xl-7 pt-lg-4">

            <div class="view">
              <img src="https://mdbootstrap.com/img/illustrations/graphics(2).png" class="img-fluid" alt="smaple image">
            </div>

          </div>

        </div>

      </div>

    </section>
    <!-- Intro -->

  </header>
  <!-- Main navigation -->

  <!-- Main layout -->
  <main>

    <div class="container">

      <!-- Section: About Us -->
      <section id="about" class="mb-5 pb-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">Mengapa harus bergabung ?</h2>
        <hr class="hr-pink my-3">
        <p class="lead grey-text text-center w-responsive mx-auto mb-5 pb-3">Selain karena wajib bagi mahasiswa aktif Amikom untuk bergabung , web keren ini 
        juga memfasilitasi baik mahasiswa maupun dosen Amikom untuk dapat membantu jalannya kegiatan perkuliahan secara daring.</p>

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-md-4 mb-md-0 mb-5">

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-lg-2 col-md-3 col-2">
                <i class="fas fa-wifi orange-pastel fa-2x"></i>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-lg-10 col-md-9 col-10">
                <h4 class="font-weight-bold orange-pastel">Bergabung Kelas</h4>
                <p class="grey-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                  doloremque laudantium,
                  totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                  sunt explicabo.
                  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                
              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 mb-md-0 mb-5">

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-lg-2 col-md-3 col-2">
                <i class="fas fa-coffee blue-pastel fa-2x"></i>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-lg-10 col-md-9 col-10">
                <h4 class="font-weight-bold blue-pastel">Tugas Perkuliahan</h4>
                <p class="grey-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                  adipisci velit,
                  sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem,
                  sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                
              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4">

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-lg-2 col-md-3 col-2">
                <i class="far fa-grin-beam green-pastel fa-2x"></i>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-lg-10 col-md-9 col-10">
                <h4 class="font-weight-bold green-pastel">Forum Diskusi</h4>
                <p class="grey-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                  praesentium
                  voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate
                  non provident,
                  similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                
              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: About Us -->

      <!-- Section: Offer -->
      <section id="offer" class="mb-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">Manfaat yang didapat</h2>
        <hr class="hr-pink my-3">
        <p class="lead grey-text text-center w-responsive mx-auto mb-5 pb-3">Banyak manfaat yang nantinya dapat kamu rasakan setelah bergabung disini.</p>

        <!-- Grid row -->
        <div class="row mb-lg-0 mb-5">

          <!-- Grid column -->
          <div class="col-lg-6 mb-lg-0 mb-5" style="margin-top: -5.3rem;">
            <div class="view">
              <img src="https://mdbootstrap.com/img/illustrations/graphics(3).png" class="img-fluid" alt="smaple image">
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-6">

            <!-- Grid row -->
            <div class="row mb-3">
              <div class="col-md-1 col-2">
                <i class="fas fa-book-open purple-pastel fa-2x"></i>
              </div>
              <div class="col-md-11 col-10">
                <h5 class="font-weight-bold purple-pastel mb-2">Belajar hal-hal baru</h5>
                <p class="grey-text">Jelajahi materi , teman dan ilmu baru dengan bergabung disini. </p>
              </div>
            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="row mb-3">
              <div class="col-md-1 col-2">
                <i class="fas fa-wifi green-pastel fa-2x"></i>
              </div>
              <div class="col-md-11 col-10">
                <h5 class="font-weight-bold green-pastel mb-2">Gabung Forum</h5>
                <p class="grey-text">Dengan bergabung kedalam forum , kamu bisa saling berbagi berkenalan dengan mahasiswa aktif lainnya.</p>
              </div>
            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="row">
              <div class="col-md-1 col-2">
                <i class="far fa-clock orange-pastel fa-2x"></i>
              </div>
              <div class="col-md-11 col-10">
                <h5 class="font-weight-bold orange-pastel mb-2">Belajar Kapan Saja</h5>
                <p class="grey-text mb-0">Kamu dapat melakukan perkuliahan dan berdiskusi dengan mahasiswa aktif lainnya kapanpun dan dimanapun.</p>
              </div>
            </div>
            <!-- Grid row -->

          </div>
          <!-- Grid column -->

        </div>

        <!-- Grid row -->

      </section>
      <!-- Section: Offer -->

      <!-- Section: Articles -->
      <section id="articles" class="mb-5 pb-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">Fitur Lengkap</h2>
        <hr class="hr-pink my-3">
        <p class="lead grey-text text-center w-responsive mx-auto mb-5 pb-3">Duis aute irure dolor in reprehenderit in
          voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit.</p>

        <!-- Grid row -->
        <div class="row text-center">

          <!-- Grid column -->
          <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
            <!--Featured image-->
            <div class="view overlay rounded z-depth-1">
              <img src="https://mdbootstrap.com/img/Photos/Others/images/58.jpg" class="img-fluid"
                alt="Sample project image">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!--Excerpt-->
            <div class="card-body pb-0">
              <h4 class="font-weight-bold my-3">The title of the news</h4>
              <p class="grey-text">Et harum quidem rerum facilis est et expedita distinctio.
                Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
                placeat facere possimus,
                omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis
                debitis aut rerum necessitatibus
                saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
              </p>
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
            <!--Featured image-->
            <div class="view overlay rounded z-depth-1">
              <img src="https://mdbootstrap.com/img/Photos/Others/project4.jpg" class="img-fluid"
                alt="Sample project image">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!--Excerpt-->
            <div class="card-body pb-0">
              <h4 class="font-weight-bold my-3">The title of the news</h4>
              <p class="grey-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                adipisci velit,
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                aliquid ex ea commodi consequatur,
                quis autem vel eum iure reprehenderit qui in ea voluptate velit?
              </p>
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4 col-md-6">
            <!--Featured image-->
            <div class="view overlay rounded z-depth-1">
              <img src="https://mdbootstrap.com/img/Photos/Others/images/88.jpg" class="img-fluid"
                alt="Sample project image">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!--Excerpt-->
            <div class="card-body pb-0">
              <h4 class="font-weight-bold my-3">The title of the news</h4>
              <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur proident sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>
          <!-- Grid column -->

      </section>
      <!-- Section: Articles -->

      <!-- Section: Contact Us -->
      <section id="login" class="mb-3">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">Masuk ke Akun Anda</h2>
        <hr class="hr-pink my-3">
        <br><br>
        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-5 mb-lg-0 mb-4">

            <!-- Form -->
            <form class="ml-lg-5" action="action/do_login.php" method="POST">

                <!--Form with header-->
              <div class="card wow fadeIn container" data-wow-delay="0.3s">
                <div class="card-body">

                  <!--Header-->
                  <div class="form-header purple-gradient">
                    <h4 class="mb-0"><i class="fas fa-user"></i> Masuk</h4>
                  </div>

                  <!--Body-->
                    <div class="md-form">
                      <i class="far fa-id-badge prefix"></i>
                      <input type="text" name="userID" id="orangeForm-id" minlength="10" maxlength="10" class="form-control">
                      <label for="orangeForm-id">NIM/NIDN</label>
                    </div>

                    <div class="md-form">
                      <i class="fas fa-unlock-alt prefix"></i>
                      <input type="password" minlength="8" name="userPass" id="orangeForm-pass" class="form-control">
                      <label for="orangeForm-pass">Kata Sandi</label>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn purple-gradient btn-md btn-rounded font-weight-bold">Masuk</button>
                      <button type="button" class="btn purple-gradient btn-md btn-rounded font-weight-bold" data-toggle="modal" data-target="#registerModal">Daftar</button>
                    </div>
                </div>
              </div>
              <!--/Form with header-->
            </form>
            <!-- Form -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-7" style="margin-top: -7rem;">

            <div class="view">
              <img src="https://mdbootstrap.com/img/illustrations/graphics(1).png" class="img-fluid" alt="smaple image">
            </div>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Contact Us -->

    </div>

  </main>
  <!-- Main layout -->

  <!-- Footer -->
  <footer class="page-footer font-small pt-4 dark-grey-text">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-2 mt-md-0 mt-3">

          <h3 class="mb-3">
            <a class="brand purple-pastel" href="#">
              <strong>the <br><span class="font-weight-bold">Place</span><span class="font-weight-bold pink-pastel">.</span>
              </strong>
            </a>
          </h3>

          <p class="mb-1"><strong>Jefferson 5 Street<br>
          65-987 Paris</strong></p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-1 mb-md-0 mb-3">

          <!-- Links -->
          <ul class="list-unstyled">
            <li>
              <a class="dark-grey-text" href="#!">Homepage</a>
            </li>
            <li>
              <a class="dark-grey-text" href="#!">Tentang</a>
            </li>
            <li>
              <a class="dark-grey-text" href="#!">Manfaat</a>
            </li>
            <li>
              <a class="dark-grey-text" href="#!">Articles</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-1 mb-md-0 mb-3">

          <!-- Links -->
          <ul class="list-unstyled">
            <li>
              <a class="dark-grey-text" href="#!">Rules</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-1 mb-md-0 mb-3">

          <!-- Links -->
          <ul class="list-unstyled">
            <li>
              <a class="dark-grey-text" href="#!">Cookie Policy</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-1 mb-md-0 mb-3">

          <!-- Links -->
          <ul class="list-unstyled">
            <li>
              <a class="dark-grey-text" href="#!">Facebook</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-1 mb-md-0 mb-3">

          <!-- Links -->
          <ul class="list-unstyled">
            <li>
              <a class="dark-grey-text" href="#!">Instagram</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->
        
        <!-- Grid column -->
        <div class="col-md-2 col-lg-1 mb-md-0 mb-3">

          <!-- Links -->
          <ul class="list-unstyled">
            <li>
              <a class="dark-grey-text" href="#!">Linkedin</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-12 col-lg-4 my-lg-0 my-4">

          <h5 class="mb-4"><strong>If you want to know more about the Place,
              leave us your email address:</strong></h5>

          <div class="input-group">
              <input type="text" class="form-control" placeholder="Your e-mail address" aria-label="Recipient's username"
                aria-describedby="basic-addon2">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Send</span>
              </div>
            </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 dark-grey-text">© 2018 Copyright:
      <a class="text-black-50" href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->