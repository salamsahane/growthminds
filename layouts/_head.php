<!-- Header -->
<?php
use App\Utils\Funcs;
?>
<div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed
    data-condenses>
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-dark bg-dark pr-0 pr-md-16pt" id="default-navbar" data-primary>

            <!-- Navbar toggler -->
            <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Brand -->
            <a href="/" class="navbar-brand">
                <img class="navbar-brand-icon mr-0 mr-md-8pt" src="/assets/images/logo/white-100%402x.png" width="30"
                    alt="Growth Minds">
                <span class="d-none d-md-block">Growth Minds</span>
            </a>

            <button class="btn btn-black mr-16pt" data-toggle="modal" data-target="#courses">Courses <i
                    class="material-icons">arrow_drop_down</i></button>

            <!-- <form class="search-form search-form--black search-form-courses d-none d-md-flex" action="http://tutorio-bootstrap.frontendmatter.com/library-filters.html">
                <input type="text" class="form-control" placeholder="What would you like to learn?">
                <button class="btn" type="submit" role="button"><i class="material-icons">search</i></button>
            </form> -->

            <?php if(Funcs::is_logged_in()):  ?>
                <!-- <ul class="nav navbar-nav ml-auto flex-nowrap" style="white-space: nowrap;">
                    <li class="d-none d-sm-flex nav-item">
                        <a href="/account/logout" class="btn btn-accent">Logout</a>
                    </li>
                </!-->
                <nav class="nav navbar-nav ml-auto flex-nowrap">
                        <div class="nav-item dropdown d-none d-sm-flex ml-16pt">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" src="<?= $user->avatar ?>" alt="<?= $user->profil ?>" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header"><strong><?= $user->profil ?></strong></div>
                                <a class="dropdown-item" href="/account/<?= strtolower($user->profil) ?>-profile/<?= $user->person_id ?>">Profile</a>
                                <a class="dropdown-item" href="student-dashboard.html">Dashboard</a>
                                <a class="dropdown-item" href="student-my-courses.html">My Courses</a>
                                <a class="dropdown-item" href="student-quiz-results.html">Quiz Results</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header"><strong>Account</strong></div>
                                <a class="dropdown-item" href="student-edit-account.html">Edit Account</a>
                                <a class="dropdown-item" href="student-billing.html">Billing</a>
                                <a class="dropdown-item" href="student-billing-history.html">Payments</a>
                                <a class="dropdown-item" href="/account/logout">Logout</a>
                            </div>
                        </div>
                    </nav>
            <?php else: ?>
                <!-- Main Navigation -->
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto flex-nowrap" style="white-space: nowrap;">
                    <li class="ml-16pt nav-item">
                        <a href="/account/login" class="nav-link">
                            <i class="material-icons">lock_open</i>
                            <span class="sr-only">Login</span>
                        </a>
                    </li>
                    <li class="d-none d-sm-flex nav-item">
                        <a href="/account/signup" class="btn btn-accent">Join Us</a>
                    </li>
                </ul>
            <?php endif ?>
            <!-- // END Main Navigation -->
        </div>

    </div>
</div>

<!-- // END Header -->