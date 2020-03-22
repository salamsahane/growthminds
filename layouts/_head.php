<!-- Header -->
<?php
use App\Utils\Funcs;
?>
<?php if(!isset($_COOKIE['accept-cookies'])): ?>
<div class="cookie-banner">
    <div class="container">
        <p>
            The website uses cookies  in order to offer you most relevant information, responsive information, improve your browsing experience and store informations about how you use it. These cookies are completely safe and secure and will never contain any sensitive information. <a href="/policy/cookie-policy">Read more here</a>
        </p>
        <a href="/policy/accept-cookie" class="btn btn-outline-white">Ok, I accept</a>
    </div>
</div>
<?php endif; ?>
<div id="header" class="mdk-header js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed
    data-condenses>
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm bg-gradient-red navbar-dark pr-0 pr-md-16pt" id="default-navbar" data-primary>

            <!-- Navbar toggler -->
            <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Brand -->
            <a href="/" class="navbar-brand">
                <img class="navbar-brand-icon mr-0 mr-md-8pt" src="/assets/images/logo/white-100%402x.png" width="30"
                    alt="<?= WEBSITE_NAME ?>">
                <span class="d-none d-md-block"><?=WEBSITE_NAME ?></span>
            </a>

            <?php if(Funcs::is_logged_in()):  ?>
                <?php if($person->profil != 'instructor'): ?>
                <button class="btn btn-light mr-16pt" data-toggle="modal" data-target="#courses">Programs <i
                    class="material-icons">arrow_drop_down</i></button>
                <?php endif ?>

                <nav class="nav navbar-nav ml-auto flex-nowrap">
                    <div class="nav-item dropdown d-none d-sm-flex ml-16pt">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <div class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="<?= $person->avatar ?>" alt="<?= $person->profil ?>" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header"><strong><?= ucfirst($person->profil) ?></strong></div>
                            <a class="dropdown-item" href="/<?= strtolower($person->profil) ?>/<?= strtolower($person->profil) ?>-profile/<?= $person->person_id ?>">Profile</a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-header"><strong>Account</strong></div>
                            <?php if($person->profil != "prospect"): ?>
                            <a class="dropdown-item" href="/<?= strtolower($person->profil) ?>/edit-profile/<?= $person->person_id ?>">Edit Account</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="/account/logout">Logout</a>
                        </div>
                    </div>
                </nav>
            <?php else: ?>
                <button class="btn btn-light mr-16pt" data-toggle="modal" data-target="#courses">Programs <i
                    class="material-icons">arrow_drop_down</i></button>
                    
                <!-- Main Navigation -->
                <ul class="d-none d-md-flex nav navbar-nav">
                    <li class="nav-item">
                        <a href="/home/about-us" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="/home/contact-us" class="nav-link">Contact</a>
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
                        <a href="/account/signup" class="btn btn-primary">Register Now</a>
                    </li>
                </ul>
            <?php endif ?>
            <!-- // END Main Navigation -->
        </div>

    </div>
</div>

<!-- // END Header -->