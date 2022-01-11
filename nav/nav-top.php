<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SiPren - Sistem Presensi </title>
    <!-- Favicon icon -->
    <link rel="icon" sizes="25x25" href="../images/sipren.png">
    <link rel="stylesheet" href="../vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="../vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <style>
         @font-face {
        font-family: 'gotham-rounded';
        src: url(../icons/gotham-rounded/GothamRounded-Medium.otf);
        }

        body{
            font-family: 'gotham-rounded';
        }
        .welcome-text h4{
            color: #39B44A;
            font-family: 'gotham-rounded';
        }
        .welcome-text h4 p{
            font-family: 'gotham-rounded';
        }
       .quixnav{
           background-color:#39B44a;
           color: #ffffff;
       } 
       .quixnav:hover {
           background-color:#39B44a;
       } 
       .nav-text {
        color: #FFFFFF;
       } 
        .nav-text:hover {
        color: #FFFFFF;
       } 

       .breadcrumb {
  display: flex;
  flex-wrap: wrap;
  padding: 0.75rem 1rem;
  margin-bottom: 1rem;
  list-style: none;
  background-color: #e9ecef;
  border-radius: 0.25rem; }

.breadcrumb-item + .breadcrumb-item {
  padding-left: 0.5rem; }
  .breadcrumb-item + .breadcrumb-item::before {
    display: inline-block;
    padding-right: 0.5rem;
    color: #6c757d;
    content: "/"; }

.breadcrumb-item + .breadcrumb-item:hover::before {
  text-decoration: underline; }

.breadcrumb-item + .breadcrumb-item:hover::before {
  text-decoration: none; }

.breadcrumb-item.active {
  color: #6c757d; }

  .quixnav ul {
    padding: 0;
    margin: 0;
    list-style: none;
    font-family: 'gotham-rounded';
    font-size: 14pt; }
  .quixnav .metismenu {
    display: flex;
    flex-direction: column; }
    .quixnav .metismenu.fixed {
      position: fixed;
      top: 0;
      width: 100%;
      left: 0; }
    .quixnav .metismenu > li {
      display: flex;
      flex-direction: column; }
      .quixnav .metismenu > li a > i {
        font-size: 1.125rem;
        display: inline-block;
        vertical-align: middle;
        padding: 0 0.4375rem;
        font-weight: 700;
        position: relative;
        top: -2px; }
      .quixnav .metismenu > li > a {
        color: #bdbdc7; }
      .quixnav .metismenu > li:hover > a, .quixnav .metismenu > li:focus > a, .quixnav .metismenu > li.mm-active > a {
        background-color: lightgreen;
        color: #fff; }
      .quixnav .metismenu > li.mm-active ul {
        background-color: transparent; }
        .quixnav .metismenu > li.mm-active ul ul {
          background-color:  lightgreen }
    .quixnav .metismenu li {
      position: relative; }
    .quixnav .metismenu ul {
      background-color:  lightgreen;
      transition: all .2s ease-in-out; }
      .quixnav .metismenu ul a {
        padding-left: 54px;
        font-weight: 300; }
        .quixnav .metismenu ul a:hover, .quixnav .metismenu ul a:focus, .quixnav .metismenu ul a.mm-active {
          text-decoration: none;
          color: #fff; }
        [direction="rtl"] .quixnav .metismenu ul a {
          padding-right: 54px; }
      .quixnav .metismenu ul ul a {
        padding-left: 74px; }
      .quixnav .metismenu ul ul ul a {
        padding-left: 94px; }
    .quixnav .metismenu a {
      position: relative;
      display: block;
      padding: 0.8125rem 1.25rem;
      outline-width: 0;
      color: #ffffff;
      text-decoration: none; }
    .quixnav .metismenu .has-arrow:after {
      width: .35rem;
      height: .35rem;
      right: 1.5625rem;
      top: 48%;
      border-color: inherit;
      -webkit-transform: rotate(-225deg) translateY(-50%);
      transform: rotate(-225deg) translateY(-50%); }
    .quixnav .metismenu .has-arrow[aria-expanded=true]:after,
    .quixnav .metismenu .mm-active > .has-arrow:after {
      -webkit-transform: rotate(-135deg) translateY(-50%);
      transform: rotate(-135deg) translateY(-50%); }

    .stat-digit a{
        font-size: 20px;
    }
    .stat-content .stat-text{
        color: #39B44A;
        font-family: 'gotham-rounded';
        font-size: 23px;
    }
    .copyright p{
        color: black;
    }
    .nav-control .hamburger .line{
        background-color: #39B44A;

    }
    table{
        color: black;
    }
    .display thead tr th{
        color: black;
    }
    .btn-outline-primary {
  color: #fff;
  border-color: #39B44A; }
  .btn-outline-primary:hover {
    color: #fff;
    background-color: #39B44A;
    border-color: #39B44A; }
  .btn-outline-primary:focus, .btn-outline-primary.focus {
    box-shadow: 0 0 0 0.2rem rgba(89, 59, 219, 0.5); }
  .btn-outline-primary.disabled, .btn-outline-primary:disabled {
    color: #39B44A;
    background-color: transparent; }
  .btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active,
  .show > .btn-outline-primary.dropdown-toggle {
    color: #fff;
    background-color: #39B44A;
    border-color: #39B44A; }
    .btn-outline-primary:not(:disabled):not(.disabled):active:focus, .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-primary.dropdown-toggle:focus {
      box-shadow: 0 0 0 0.2rem rgba(89, 59, 219, 0.5); }

      .row{
        color: black;
        font-family: 'gotham-rounded';
        font-size: 14pt;
      }
      .row_sipren{
        color:#78c044;
        font-family: 'gotham-rounded';
        font-size: 14pt;
       }
     
      .btn-primary {
  color: #fff;
  background-color: #39B44A !important ;
  border-color: #39B44A; }
  .btn-primary {
    color: #fff;
    background-color: #39B44A !important;
    border-color: #39B44A; }
  .btn-primary:focus, .btn-primary.focus {
    }
      .btn-primary.disabled, .btn-primary:disabled {
    color: #fff;
    background-color: #39B44A;
    border-color: #39B44A; }
  .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
  .show > .btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #39B44A;
    border-color: #39B44A; }
    .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
    .show > .btn-primary.dropdown-toggle:focus {
      box-shadow: 0 0 0 0.2rem rgba(114, 88, 224, 0.5); }
    </style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"  style="background-color:#39B44A;"></div>
            <div class="sk-child sk-bounce2"  style="background-color:#39B44A;"></div>
            <div class="sk-child sk-bounce3"  style="background-color:#39B44A;"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header"  style="background-color:#39B44A;">
            <div class="row">
                <div class="col-12">
                     <img src="../images/logosipren.png" style="width:80px; height:85px; display:block; margin:auto; margin-top:-3px;">
                </div>
            </div>
            <!-- <img src="../images/tulisansipren1.png" style="width:65%; height:90px; display:block; margin:auto; margin-top:-6px;"> -->
                <!-- <img class="logo-abbr" src="./images/seruni.png" alt=""> -->
                <!-- <img class="logo-compact" src="./images/seruni.png" alt="" style="width:300px;">
                <img class="brand-title" src="./images/seruni.png" alt="" style="width:300px;"> -->
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
           
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                     
                        <ul class="navbar-nav header-right">

                        <div class="col-8">
                            <div class="row">
                            <img src=../images/Sipren-aja.png style="width:125px; height:40px; margin-top:8px;">
                            </div>
                            <div class="row_sipren">
                            <marquee direction="right" style="width:100px; height:40px;
                            ">Sistem Presensi</marquee>
                            </div>
                        </div>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="./page-login.html" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
