<!------------- Switch Page ------------->
<?php
    if (isset($_GET["p"])){
        $page = $_GET["p"];
    } else {
        $page = 'landing';
    }

    // check if page file doesn't exist
    if (!file_exists('page/'.$page.'.php')){
        $page = '404';        
    }

    // get page title
    $page_title = ucwords($page); // uppercase first letter
?>
<!------------- End Switch Page ------------->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ALICE</title>
        <?php
            // change page title
            echo '<script>document.title += " | '.$page_title.'"</script>';
        ?>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/<?php if ($page == 'landing' || $page == 'register') echo '_';?>mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.css" rel="stylesheet">

        <style>
            .md-outline.select-wrapper+label {
                top: .6em !important;
                z-index: 2 !important;
            }
            .alice-avatar {
                width: 40px;
            }
            .alice-class {
                min-width: 280px;
                max-width: 280px;
            }
            @media only screen and (min-width: 768px) {
                /* For desktop: */
                .alice-notif {
                    width: 320px;
                }
            }
        </style>
    </head>

<?php
    // put config file
    include 'config/conf.php';

    // put page file (landing / 404 / register)
    if ($page == 'landing' || $page == '404' || $page == 'register') {
        include 'page/'.$page.'.php';
    } else { 
    // put default page
?>
    <body>
        <header>
            <!-- Navbar -->
            <nav class="mb-2 navbar navbar-expand-lg navbar-dark secondary-color lighten-1">
                <a class="navbar-brand" href="#">ALICE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMainContent" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMainContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?php if ($page == 'home') echo 'active'; ?>">
                            <a class="nav-link px-3 font-weight-normal" href="?p=home">Home
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($page == 'classroom') echo 'active'; ?>">
                            <a class="nav-link px-3 font-weight-normal" href="?p=classroom">Ruang Kelas</a>
                        </li>
                        <li class="nav-item <?php if ($page == 'forum') echo 'active'; ?>">
                            <a class="nav-link px-3 font-weight-normal" href="?p=forum">Forum</a>
                        </li>
                        <li class="nav-item <?php if ($page == 'materi') echo 'active'; ?>">
                            <a class="nav-link px-3 font-weight-normal" href="?p=materi">Materi</a>
                        </li>
                        <li class="nav-item <?php if ($page == 'dosen' || $page == 'profile') echo 'active'; ?>">
                            <a class="nav-link px-3 font-weight-normal" href="?p=dosen">Dosen</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <!-- button tambah -->
                        <?php
                            include 'action/_modals.php';    
                            if ($page == 'forum') {
                                echo '<button class="btn btn-sm btn-outline-white" type="button" data-toggle="modal" data-target="#createForumPost">Buat post</button>';
                            }
                        ?>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link waves-effect waves-light" id="navbarMainNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell mt-1"></i>
                                <span class="badge badge-danger">300</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary alice-notif" aria-labelledby="navbarMainNotification">
                            <a class="dropdown-item d-flex" href="#">
                                <span class="w-100 text-wrap">Rizky menambahkan post ke IF05</span>
                                <span class="flex-shrink-1 ml-3 align-self-center"><i class="fas fa-clock" aria-hidden="true"></i> 13 min</span>
                            </a>
                            <a class="dropdown-item d-flex" href="#">
                                <span class="w-100 text-wrap">Rizky mengomentari post anda di IF05</span>
                                <span class="flex-shrink-1 ml-3 align-self-center"><i class="fas fa-clock" aria-hidden="true"></i> 13 min</span>
                            </a>
                            <a class="dropdown-item d-flex" href="#">
                                <span class="w-100 text-wrap">Rizky membalas komentar anda di forum</span>
                                <span class="flex-shrink-1 ml-3 align-self-center"><i class="fas fa-clock" aria-hidden="true"></i> 13 min</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-link p-0" href="#">Selengkapnya</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item avatar dropdown my-1 ml-1">
                        <a class="nav-link dropdown-toggle rounded-circle" id="navbarMainContent-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0"
                            alt="avatar image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarMainContent-dropdown">
                            <a class="dropdown-item" href="#">Akunku</a>
                            <a class="dropdown-item" href="#">Keluar</a>
                        </div>
                    </li>
                    </ul>
                </div>
            </nav>
        <header>
        <!-- End Navbar -->
        <?php
        
            // include page file
            include 'page/'.$page.'.php';
        }

        ?>

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>

        <script>
            // Tooltips Initialization
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript">
            // Material Select Initialization
            $(document).ready(function () {
            $('.mdb-select').materialSelect();
            $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function () {
                $(this).closest('.select-outline').find('label').toggleClass('active');
                $(this).closest('.select-outline').find('.caret').toggleClass('active');
            });
            });
        </script>
        <script>
            $('.datepicker').pickadate({
            // Escape any “rule” characters with an exclamation mark (!).
                format: 'dd/mm/yyyy',
                formatSubmit: 'yyyy/mm/dd'
            })
        </script>
    </body>
</html>