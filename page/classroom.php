<div class="container-fluid">
    <div class="d-flex flex-wrap justify-content-start">
        <?php
            for ($i=0; $i < 6; $i++) { 
                ?>
                    <div class="alice-class m-3">
                        <div class="card">
                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!-- Button -->
                            <a class="btn-floating btn-action ml-auto mr-4 purple-gradient"><i class="fas fa-chevron-right pl-1"></i></a>
                            <!-- Card content -->
                            <div class="card-body">
                                <!-- Title -->
                                <h4 class="card-title">Nama kelas</h4>
                                <hr>
                                <!-- Text -->
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="rounded-bottom purple-gradient lighten-3 text-center pt-3">
                                <ul class="list-unstyled list-inline font-small">
                                    <!-- <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>05/10/2015</li> -->
                                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fas fa-user pr-1"></i>12 Siswa</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</div>