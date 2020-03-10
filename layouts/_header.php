<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= ucfirst($title) . " | Growth Minds" ?? "Growth Minds" ?></title>

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="/assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="/assets/vendor/fix-footer.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="/assets/css/material-icons.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="/assets/css/fontawesome.css" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="/assets/css/preloader.css" rel="stylesheet">

    <!-- AlertifyJS -->
    <link rel="stylesheet" href="<?= '/libraries' . DIRECTORY_SEPARATOR . 'AlertifyJS' . DIRECTORY_SEPARATOR .  'build' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'alertify.css'?>">
    <link rel="stylesheet" href="<?= '/libraries' . DIRECTORY_SEPARATOR . 'AlertifyJS' . DIRECTORY_SEPARATOR .  'build' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'default.min.css'?>">

    <!-- App CSS -->
    <link type="text/css" href="/assets/css/main.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/app.css" rel="stylesheet">
</head>

<body class="layout-navbar-mini-fixed-bottom">

    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

    <?php require('_head.php'); ?>