<?php

include '../controller/facturec.php';

$error = "";


$facture = null;

// create an instance of the controller
$factureC = new factureC();
if (
    isset($_POST["Nom"]) &&
    isset($_POST["quantite"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["date_debut"])&&
    isset($_POST["date_fin"]) 
) {
    if (
        !empty($_POST['Nom']) &&
        !empty($_POST['quantite']) &&
        !empty($_POST['prix']) &&
        !empty($_POST['date_debut'])&&
        !empty($_POST['date_fin']) )
        { 
        $facture = new facture(
           
            $_POST['Nom'],
            $_POST['quantite'],
            $_POST['prix'],
            new DateTime($_POST['date_debut']),
            new DateTime($_POST['date_fin']),           
            $_POST['idfacture']
        );
        $factureC->updatfacture($facture, $_POST["idfacture"]);
        header('Location:Listefacture.php');
        } else
        $error = "Missing information";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description"
        content="These can be used with other components and elements to create stunning and unique new elements for your UIs.">
    <link rel="icon" href="favicon.ico">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="main.07a59de7b920cd76b874.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-gray">
        <div class="app-main">
            <div class="app-sidebar-wrapper">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <a href="listefacture.php" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template"
                            class="logo-src"></a>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                    <div class="scrollbar-sidebar scrollbar-container">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Menu</li>

                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-plugin"></i>
                                        Dachboard
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="listefacture.php">
                                                <i class="metismenu-icon">
                                                </i>facture manegement
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="metismenu-icon">
                                                </i>???????
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="metismenu-icon">
                                                </i>?????
                                            </a>
                                        </li>
                                    </ul>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-sidebar-overlay d-none animated fadeIn"></div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="header-mobile-wrapper">
                        <div class="app-header__logo">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template"
                                class="logo-src"></a>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                            <div class="app-header__menu">
                                <span>
                                    <button type="button"
                                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="app-header">

                        <div class="app-header-right">
                            <div class="search-wrapper">
                                <i class="search-icon-wrapper typcn typcn-zoom-outline"></i>
                                <input type="text" placeholder="Search...">
                            </div>
                            <div class="header-btn-lg pr-0">
                                <div class="header-dots">
                                    <div class="dropdown">
                                        <button type="button" aria-haspopup="true" aria-expanded="false"
                                            data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                                            <i class="typcn typcn-th-large-outline"></i>
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-vicious-stance">
                                                    <div class="menu-header-image opacity-4"
                                                        style="background-image: url('assets/images/dropdown-header/city5.jpg');">
                                                    </div>
                                                    <div class="menu-header-content text-white">
                                                        <h5 class="menu-header-title">Grid Dashboard</h5>
                                                        <h6 class="menu-header-subtitle">Easy grid navigation inside
                                                            dropdowns</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-menu grid-menu-xl grid-menu-3col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <button
                                                            class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                            <i
                                                                class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i>
                                                            Automation
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <button
                                                            class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                            <i
                                                                class="pe-7s-piggy icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                            </i>
                                                            Reports
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <button
                                                            class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                            <i
                                                                class="pe-7s-config icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                            </i>
                                                            Settings
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <button
                                                            class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                            <i
                                                                class="pe-7s-browser icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                            </i>
                                                            Content
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <button
                                                            class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                            <i
                                                                class="pe-7s-hourglass icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                            </i>
                                                            Activity
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <button
                                                            class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                            <i
                                                                class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                            </i>
                                                            Contacts
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item"></li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button
                                                        class="btn-shadow btn btn-primary btn-sm">Follow-ups</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" aria-haspopup="true" aria-expanded="false"
                                            data-toggle="dropdown" class="p-0 btn btn-link">
                                            <i class="typcn typcn-bell"></i>
                                            <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header mb-0">
                                                <div class="dropdown-menu-header-inner bg-night-sky">
                                                    <div class="menu-header-image opacity-5"
                                                        style="background-image: url('assets/images/dropdown-header/city2.jpg');">
                                                    </div>
                                                    <div class="menu-header-content text-light">
                                                        <h5 class="menu-header-title">Notifications</h5>
                                                        <h6 class="menu-header-subtitle">You have <b>21</b> unread
                                                            messages</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul
                                                class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link active" data-toggle="tab"
                                                        href="#tab-messages-header">
                                                        <span>Messages</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" data-toggle="tab"
                                                        href="#tab-events-header">
                                                        <span>Events</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" data-toggle="tab"
                                                        href="#tab-errors-header">
                                                        <span>System</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                                                    <div class="scroll-area-sm">
                                                        <div class="scrollbar-container">
                                                            <div class="p-3">
                                                                <div class="notifications-box">
                                                                    <div
                                                                        class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                                        <div
                                                                            class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">All Hands
                                                                                        Meeting</h4><span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <p>Yet another one, at <span
                                                                                            class="text-success">15:00
                                                                                            PM</span></p><span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">Build the
                                                                                        production release
                                                                                        <span
                                                                                            class="badge badge-danger ml-2">NEW</span>
                                                                                    </h4>
                                                                                    <span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">Something
                                                                                        not important
                                                                                        <div
                                                                                            class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/1.jpg"
                                                                                                        alt>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/2.jpg"
                                                                                                        alt>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/3.jpg"
                                                                                                        alt>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/4.jpg"
                                                                                                        alt>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/5.jpg"
                                                                                                        alt>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/9.jpg"
                                                                                                        alt>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/7.jpg"
                                                                                                        alt>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/8.jpg"
                                                                                                        alt>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                                <div
                                                                                                    class="avatar-icon">
                                                                                                    <i>+</i>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </h4>
                                                                                    <span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="vertical-timeline-item dot-info vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">This dot
                                                                                        has an info state</h4><span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">All Hands
                                                                                        Meeting</h4><span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <p>Yet another one, at <span
                                                                                            class="text-success">15:00
                                                                                            PM</span></p><span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">Build the
                                                                                        production release
                                                                                        <span
                                                                                            class="badge badge-danger ml-2">NEW</span>
                                                                                    </h4>
                                                                                    <span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                                            <div><span
                                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div
                                                                                    class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">This dot
                                                                                        has a dark state</h4><span
                                                                                        class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-events-header" role="tabpanel">
                                                    <div class="scroll-area-sm">
                                                        <div class="scrollbar-container">
                                                            <div class="p-3">
                                                                <div
                                                                    class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                                    <div
                                                                        class="vertical-timeline-item vertical-timeline-element">
                                                                        <div><span
                                                                                class="vertical-timeline-element-icon bounce-in"><i
                                                                                    class="badge badge-dot badge-dot-xl badge-success">
                                                                                </i></span>
                                                                            <div
                                                                                class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands
                                                                                    Meeting</h4>
                                                                                <p>Lorem ipsum dolor sic amet, today at
                                                                                    <a href="javascript:void(0);">12:00
                                                                                        PM</a>
                                                                                </p><span
                                                                                    class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="vertical-timeline-item vertical-timeline-element">
                                                                        <div><span
                                                                                class="vertical-timeline-element-icon bounce-in"><i
                                                                                    class="badge badge-dot badge-dot-xl badge-warning">
                                                                                </i></span>
                                                                            <div
                                                                                class="vertical-timeline-element-content bounce-in">
                                                                                <p>Another meeting today, at <b
                                                                                        class="text-danger">12:00 PM</b>
                                                                                </p>
                                                                                <p>Yet another one, at <span
                                                                                        class="text-success">15:00
                                                                                        PM</span></p><span
                                                                                    class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="vertical-timeline-item vertical-timeline-element">
                                                                        <div><span
                                                                                class="vertical-timeline-element-icon bounce-in"><i
                                                                                    class="badge badge-dot badge-dot-xl badge-danger">
                                                                                </i></span>
                                                                            <div
                                                                                class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the
                                                                                    production release</h4>
                                                                                <p>Lorem ipsum dolor sit
                                                                                    amit,consectetur eiusmdd tempor
                                                                                    incididunt ut labore et dolore magna
                                                                                    elit enim at minim veniam quis
                                                                                    nostrud</p><span
                                                                                    class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="vertical-timeline-item vertical-timeline-element">
                                                                        <div><span
                                                                                class="vertical-timeline-element-icon bounce-in"><i
                                                                                    class="badge badge-dot badge-dot-xl badge-primary">
                                                                                </i></span>
                                                                            <div
                                                                                class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title text-success">
                                                                                    Something not important</h4>
                                                                                <p>Lorem ipsum dolor sit
                                                                                    amit,consectetur elit enim at minim
                                                                                    veniam quis nostrud</p><span
                                                                                    class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="vertical-timeline-item vertical-timeline-element">
                                                                        <div><span
                                                                                class="vertical-timeline-element-icon bounce-in"><i
                                                                                    class="badge badge-dot badge-dot-xl badge-success">
                                                                                </i></span>
                                                                            <div
                                                                                class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands
                                                                                    Meeting</h4>
                                                                                <p>Lorem ipsum dolor sic amet, today at
                                                                                    <a href="javascript:void(0);">12:00
                                                                                        PM</a>
                                                                                </p><span
                                                                                    class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="vertical-timeline-item vertical-timeline-element">
                                                                        <div><span
                                                                                class="vertical-timeline-element-icon bounce-in"><i
                                                                                    class="badge badge-dot badge-dot-xl badge-warning">
                                                                                </i></span>
                                                                            <div
                                                                                class="vertical-timeline-element-content bounce-in">
                                                                                <p>Another meeting today, at <b
                                                                                        class="text-danger">12:00 PM</b>
                                                                                </p>
                                                                                <p>Yet another one, at <span
                                                                                        class="text-success">15:00
                                                                                        PM</span></p><span
                                                                                    class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="vertical-timeline-item vertical-timeline-element">
                                                                        <div><span
                                                                                class="vertical-timeline-element-icon bounce-in"><i
                                                                                    class="badge badge-dot badge-dot-xl badge-danger">
                                                                                </i></span>
                                                                            <div
                                                                                class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the
                                                                                    production release</h4>
                                                                                <p>Lorem ipsum dolor sit
                                                                                    amit,consectetur eiusmdd tempor
                                                                                    incididunt ut labore et dolore magna
                                                                                    elit enim at minim veniam quis
                                                                                    nostrud</p><span
                                                                                    class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="vertical-timeline-item vertical-timeline-element">
                                                                        <div><span
                                                                                class="vertical-timeline-element-icon bounce-in"><i
                                                                                    class="badge badge-dot badge-dot-xl badge-primary">
                                                                                </i></span>
                                                                            <div
                                                                                class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title text-success">
                                                                                    Something not important</h4>
                                                                                <p>Lorem ipsum dolor sit
                                                                                    amit,consectetur elit enim at minim
                                                                                    veniam quis nostrud</p><span
                                                                                    class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-errors-header" role="tabpanel">
                                                    <div class="scroll-area-sm">
                                                        <div class="scrollbar-container">
                                                            <div class="no-results pt-3 pb-0">
                                                                <div
                                                                    class="swal2-icon swal2-success swal2-animate-success-icon">
                                                                    <div class="swal2-success-circular-line-left"
                                                                        style="background-color: rgb(255, 255, 255);">
                                                                    </div>
                                                                    <span class="swal2-success-line-tip"></span>
                                                                    <span class="swal2-success-line-long"></span>
                                                                    <div class="swal2-success-ring"></div>
                                                                    <div class="swal2-success-fix"
                                                                        style="background-color: rgb(255, 255, 255);">
                                                                    </div>
                                                                    <div class="swal2-success-circular-line-right"
                                                                        style="background-color: rgb(255, 255, 255);">
                                                                    </div>
                                                                </div>
                                                                <div class="results-subtitle">All caught up!</div>
                                                                <div class="results-title">There are no system errors!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item"></li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button
                                                        class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">View
                                                        Latest Changes</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-btn-lg pr-0">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="btn-group">
                                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                    class="p-0 btn">
                                                    <img width="42" class="rounded" src="assets/images/avatars/3.jpg"
                                                        alt>
                                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                                </a>
                                                <div tabindex="-1" role="menu" aria-hidden="true"
                                                    class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                                    <div class="dropdown-menu-header">
                                                        <div class="dropdown-menu-header-inner bg-info">
                                                            <div class="menu-header-image opacity-2"
                                                                style="background-image: url('assets/images/dropdown-header/city1.jpg');">
                                                            </div>
                                                            <div class="menu-header-content text-left">
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <img width="42" class="rounded-circle"
                                                                                src="assets/images/avatars/3.jpg" alt>
                                                                        </div>
                                                                        <div class="widget-content-left">
                                                                            <div class="widget-heading">Minnie Betts
                                                                            </div>
                                                                            <div class="widget-subheading opacity-8">A
                                                                                short profile description
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-right mr-2">
                                                                            <button
                                                                                class="btn-pill btn-shadow btn-shine btn btn-focus">Logout
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="scroll-area-xs" style="height: 150px;">
                                                        <div class="scrollbar-container ps">
                                                            <ul class="nav flex-column">
                                                                <li class="nav-item-header nav-item">Activity
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="javascript:void(0);" class="nav-link">Chat
                                                                        <div
                                                                            class="ml-auto badge badge-pill badge-info">
                                                                            8
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="nav-link">Recover Password
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item-header nav-item">My Account
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="nav-link">Settings
                                                                        <div class="ml-auto badge badge-success">New
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="nav-link">Messages
                                                                        <div class="ml-auto badge badge-warning">512
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="javascript:void(0);" class="nav-link">Logs
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-divider mb-0 nav-item"></li>
                                                    </ul>
                                                    <div class="grid-menu grid-menu-2col">
                                                        <div class="no-gutters row">
                                                            <div class="col-sm-6">
                                                                <button
                                                                    class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                                    <i
                                                                        class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i>
                                                                    Message Inbox
                                                                </button>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <button
                                                                    class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                                    <i
                                                                        class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                                    <b>Support Tickets</b>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-divider nav-item">
                                                        </li>
                                                        <li class="nav-item-btn text-center nav-item">
                                                            <button class="btn-wide btn btn-primary btn-sm">
                                                                Open Messages
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="app-header-overlay d-none animated fadeIn"></div>
                    </div>
                    <div class="app-inner-layout app-inner-layout-page">
                        <div class="app-inner-layout__wrapper">
                            <div class="app-inner-layout__content pt-1">
                                <div class="tab-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                    <div id="error">
                                <?php echo $error; ?>
                            </div>
                                 <?php
                                 if (isset($_POST['idfacture'])) {
                                 $facture = $factureC->showfacture($_POST['idfacture']);

                                ?>
                                                        <h5 class="card-title">facture Infos</h5>
                                                        <form id="signupForm" class="col-md-10 mx-auto" method="post"
                                                            action="" novalidate="novalidate">

                                                            <div class="form-group">
                                                                <label for="idfacture">idfacture</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="idfacture " name="idfacture" value="<?php echo $facture['idfacture']; ?>"
                                                                        placeholder="idfacture ">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Nom">Nom</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="Nom" name="Nom" value="<?php echo $facture['Nom']; ?>"
                                                                        placeholder="Nom">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="quantite">quantite</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="quantite" name="quantite" value="<?php echo $facture['quantite']; ?>"
                                                                        placeholder="quantite">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="prix">prix</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="prix" name="prix" value="<?php echo $facture['prix']; ?>"
                                                                        placeholder="prix">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="date_debut">date_debut</label>
                                                                <div>
                                                                    <input type="date" class="form-control"
                                                                        id="date_debut" name="date_debut"value="<?php echo date('Y-m-d', strtotime($facture['date_debut'])); ?>" 
                                                                        placeholder="date_debut">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="date_fin">date_fin</label>
                                                                <div>
                                                                    <input type="date" class="form-control"
                                                                        id="date_fin" name="date_fin"value="<?php echo date('Y-m-d', strtotime($facture['date_fin'])); ?>" 
                                                                        placeholder="date_fin">
                                                                </div>
                                                            </div>
                                                            
                                                          
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="submit" value="submit">submit
                                                                </button>
                                                                <button type="reset" class="btn btn-primary"
                                                                    name="reset" value="reset">reset
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <?php
                         }
                         ?>
                                                        <br>


                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="app-drawer-wrapper">
        <div class="drawer-nav-btn">
            <button type="button" class="hamburger hamburger--elastic is-active">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
        </div>
       
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="assets/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>