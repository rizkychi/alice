
<?php
    // include files
    require_once('config/conf.php');

    // ------------- Switch Page ------------- //
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
    // ------------- End Switch Page ------------- //

    // Session Login
    session_start();
    if (isset($_SESSION['login']) && !$_SESSION['login']) {
        $page = 'landing';
    }
?>

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
        
        <?php
            if ($page == 'akun') {
                echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">';
            }
        ?>

        <style>
            .md-outline.select-wrapper+label {
                top: .6em !important;
                z-index: 2 !important;
            }
            .card.card-cascade .view.gradient-card-header {
                padding: 1.1rem 1rem;
            }
            .card.card-cascade .view {
                box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.2), 0 2px 8px 0 rgba(0, 0, 0, 0.19);
            }
            /* Custom CSS by ALICE */
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
            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                background-color: #F5F5F5;
                border-radius: 10px;
            }
            ::-webkit-scrollbar {
                width: 12px;
                background-color: #F5F5F5;
            }
            ::-webkit-scrollbar-thumb {
                border-radius: 10px;
                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                background-color: #aa66cc;
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
                            <a class="dropdown-item" href="?p=akun">Akunku</a>
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
                format: 'yyyy-mm-dd',
                formatSubmit: 'yyyy-mm-dd'
            })

            $('#uploadAvatar').click(function () {
                $('#upload_image').click();
            });
        </script>

    <?php if ($page == 'akun') { ?>      
        <!-- Crop image -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
        <script>  
        $(document).ready(function(){
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                width:200,
                height:200,
                type:'square' //circle
                },
                boundary:{
                width:300,
                height:300
                }
            });

            $('#upload_image').on('change', function(){
                var reader = new FileReader();
                reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });

            $('#cropImage').click(function(event){
                $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
                }).then(function(response){
                    $.ajax({
                        url:"action/upload_picture.php",
                        type: "POST",
                        data:{"image": response},
                        success:function(data)
                        {
                        $('#uploadimageModal').modal('hide');
                        $('#uploaded_image').html(data);
                        }
                    });
                })
            });
        });  
        </script>
    <?php } ?>
    <?php if ($page == 'materi') { ?>
        <!-- Slider/Carousel material list -->
        <script>
        $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<4;i++) {
                next=next.next();
                if (!next.length) {
                next=$(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
            });
        </script>
    <?php } ?>
    </body>
</html>