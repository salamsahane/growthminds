<?php

use App\Utils\Funcs;

?>
<!-- drawer -->
<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark sidebar-left" data-perfect-scrollbar>
            <div class="sidebar-p-a sidebar-b-b sidebar-m-b pt-0">
                <!-- Brand -->
                <a href="/" class="sidebar-brand">
                    <img class="sidebar-brand-icon" src="/assets/images/logo/white-100.svg" width="30" alt="<?= WEBSITE_NAME ?>">
                    <span><?= WEBSITE_NAME ?></span>
                </a>
                <!-- // END Brand -->
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-item active">
                    <a class="sidebar-menu-button" href="/">Home Page</a>
                </li>
                <li class="sidebar-menu-item <?= Funcs::is_logged_in() ? '' : "active open"; ?>">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#catalog_menu">
                        Community
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse show sm-indent" id="catalog_menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="/home/about-us">About US</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="/home/contact-us">Contact US</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="/home/faq">FAQ</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="sidebar-heading">Pages</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item <?= Funcs::is_logged_in() ? "active open" : '' ?>">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#account_menu">
                        Account
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse sm-indent" id="account_menu">
                        <?php if(Funcs::is_logged_in()): ?>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="/<?= strtolower($person->profil) ?>/<?= strtolower($person->profil) ?>-profile/<?= $person->person_id ?>">Profile</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="/instructor/edit-profile/<?= $person->person_id ?>">Edit Account</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="/account/logout">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="/account/login">Login</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="/account/signup">Signup</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- // END drawer -->