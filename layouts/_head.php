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

            <!-- Main Navigation -->
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <?php if(Funcs::is_logged_in()): ?>
                <ul class="nav navbar-nav ml-auto flex-nowrap" style="white-space: nowrap;">
                    <!-- <li class="ml-16pt nav-item">
                        <a href="/home/login" class="nav-link">
                            <i class="material-icons">lock_open</i>
                            <span class="sr-only">Login</span>
                        </a>
                    </li> -->
                    <li class="d-none d-sm-flex nav-item">
                        <a href="/account/logout" class="btn btn-accent">Logout</a>
                    </li>
                </ul>
            <?php else: ?>
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