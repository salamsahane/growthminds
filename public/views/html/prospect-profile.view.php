<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

    <div class="bg-gradient-red border-bottom-white py-32pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="avatar avatar-xxl mr-md-32pt mb-32pt mb-md-0">
                <img src="<?= $user->avatar ?>" width="104" class="avatar-img rounded-circle"
                    alt="student">
            </div>
            <div class="flex mb-32pt mb-md-0">
                <h2 class="text-white mb-0"><?= ucfirst ($user->first_name) . " " . ucfirst($user->last_name)    ?></h2>
                <p class="lead text-white-50 d-flex align-items-center"><?= $user->profil ?> - <?= ucfirst($user->gender) ?></p>
            </div>
        </div>
    </div>

    <div class="page-section bg-gradient-white">
        <div class="container page__container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="h2 mb-0 mr-3 text-accent">116</div>
                            <div class="flex">
                                <p class="mb-0"><strong>Angular</strong></p>
                                <p class="text-50 mb-0 mt-n1">Best score</p>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle text-70" data-toggle="dropdown">Popular Topics</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Popular Topics</a>
                                    <a href="#" class="dropdown-item">Web Design</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-24pt">
                            <div class="chart" style="height: 344px;">
                                <canvas id="topicIqChart" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="carouselExampleFade" class="carousel carousel-card slide mb-24pt">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="card mb-0" href="#">
                                    <img src="/assets/images/achievements/flinto.png" alt="Flinto" class="card-img"
                                        style="max-height: 100%; width: initial;">
                                    <div class="fullbleed bg-primary" style="opacity: .5;"></div>
                                    <span class="card-body fullbleed">
                                        <span class="row">
                                            <span class="col-5 text-center">
                                                <span
                                                    class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                                <span class="text-white-60 d-block mb-16pt">Jun 5, 2018</span>
                                                <img src="assets/images/illustration/achievement/128/white.png"
                                                    alt="achievement">
                                            </span>
                                            <span class="col-7 d-flex flex-column">
                                                <span class="text-right flex">
                                                    <img src="assets/images/paths/flinto_40x40%402x.png" width="64"
                                                        alt="Flinto" class="rounded">
                                                </span>
                                                <span>
                                                    <span class="h4 text-white m-0 d-block">Flinto</span>
                                                    <span class="text-white-60">Introduction to The App Design
                                                        Application</span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="card mb-0" href="#">
                                    <img src="assets/images/achievements/angular.png" alt="Angular fundamentals"
                                        class="card-img" style="max-height: 100%; width: initial;">
                                    <div class="fullbleed bg-primary" style="opacity: .5;"></div>
                                    <span class="card-body fullbleed">
                                        <span class="row">
                                            <span class="col-5 text-center">
                                                <span
                                                    class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                                <span class="text-white-60 d-block mb-16pt">Jun 5, 2018</span>
                                                <img src="assets/images/illustration/achievement/128/white.png"
                                                    alt="achievement">
                                            </span>
                                            <span class="col-7 d-flex flex-column">
                                                <span class="text-right flex">
                                                    <img src="assets/images/paths/angular_40x40%402x.png" width="64"
                                                        alt="Angular fundamentals" class="rounded">
                                                </span>
                                                <span>
                                                    <span class="h4 text-white m-0 d-block">Angular fundamentals</span>
                                                    <span class="text-white-60">Creating and Communicating Between
                                                        Angular Components</span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-icon material-icons"
                                aria-hidden="true">keyboard_arrow_right</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex align-items-center border-0">
                            <div class="h2 mb-0 mr-3 text-accent">432</div>
                            <div class="flex">
                                <p class="mb-0"><strong>Experience IQ</strong></p>
                                <p class="text-50 mb-0 mt-n1">4 days streak this week</p>
                            </div>
                            <i class="material-icons text-muted ml-2">trending_up</i>
                        </div>
                        <div class="card-body pt-0">
                            <div class="chart" style="height: 128px;">
                                <canvas id="iqChart" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="page-section bg-white">
        <div class="container page__container">
            <div class="row">
                <div class="col-md-6">
                    <h4>About me</h4>
                    <p class="text-70">Fueled by my passion for understanding the nuances of cross-cultural advertising,
                        I consider myself a forever student, eager to both build on my academic foundations in
                        psychology and sociology and stay in tune with the latest digital marketing strategies through
                        continued coursework.</p>
                </div>
                <div class="col-md-6">
                    <h4>Connect</h4>
                    <p class="text-70">I’m currently working as a freelance marketing director and always interested in
                        a challenge. Here’s how to reach out and connect.</p>
                    <div class="d-flex align-items-center">
                        <a href="#" class="text-accent fab fa-facebook-square font-size-24pt mr-8pt"></a>
                        <a href="#" class="text-accent fab fa-twitter-square font-size-24pt"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <?php require("../layouts/_foot.php"); ?>

</div>
<!-- // END Header Layout Content -->