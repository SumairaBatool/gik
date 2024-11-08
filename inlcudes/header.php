
<?php
require "config.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project</title>
    <!-- myself styles -->
    <link rel="stylesheet" href="<?= url()?>CSS/common.css">
    <link rel="stylesheet" href="<?= url()?>CSS/nav.css">
    <link rel="stylesheet" href="<?= url()?>CSS/style.css">
    <link rel="stylesheet" href="<?= url()?>CSS/footer.css">
    <link rel="stylesheet" href="<?= url()?>assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= url()?>CSS/footer.css">
    <link rel="stylesheet" href="<?= url()?>CSS/banner.css">
    <link rel="stylesheet" href="<?= url()?>CSS/admission.css">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- banner-->
    <link rel="stylesheet" href="<?= url()?>assets/QCSlider/qc.slider.css">
    <!-- marquee slider -->
    <link rel="stylesheet" href="<?= url()?>assets/MarqueeSlider/styles.css">

    <!-- googleapis -->
    <link rel="stylesheet" type="text/css" href="<?= url()?>assets/MapIt-master/MapIt-master/demo/stylesheets/styles.css">
</head>
<style>
    #scrollUp {
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
        color: #fff;
        background-image: url("imgs/top.png");
        background-repeat: no-repeat;
        background-size: 100% 100%;
        width: 60px;
        height: 60px;
    }
</style>

<body>
    <!-- header -->
    <header>
        <div class="container-fluid p-4 custom-container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-2 order-sm-1 order-lg-1 col-sm-6 custom-col">
                    <li><a href="#">URDU</a></li><br>
                    <li><a href="#">ARABIC</a></li>
                </div>
                <div class="col-lg-8 order-sm-3 order-lg-2 col-sm-12 custom-col">
                    <li><a href="#">SATELITE TOWN SKARDU, STREET NO-2</a></li><br>
                    <li><a href="#">+921818999872</a></li><br>
                    <li><a href="#">SATUARDY-THHRUSDAY:5:00AM-3:00PM</a></li>
                </div>
                <div class="col-lg-2 order-sm-2 order-lg-3 col-sm-6 custom-col">
                    <?php 
                    include_once('config.php');
                    if(!empty($_SESSION['userInfo']['username'])){ ?>
                    <li><a href="<?= url()?>pages/logout.php">Logout</a></li><br>
                    <?php } else { ?>
                        <li><a href="<?= url()?>pages/login.php">LOGIN</a></li><br>
                    <?php }  ?>
                     
                    <li><a href="<?= url() ?>admin/index.php">Admin Panel</a></li>
                </div>
        </div>
    </header>
    <!-- navigation -->