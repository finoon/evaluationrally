<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>www.finoana.com</title>

    <!-- Fontfaces CSS-->
    <?php include('back/css.php')?>
	<style>
		/* Popup container - can be anything you want */
		.popup {
		position: relative;
		display: inline-block;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		}

		/* The actual popup */
		.popup .popuptext {
		visibility: hidden;
		width: 300px;
		background-color: #555;
		color: #fff;
		text-align: center;
		border-radius: 6px;
		padding: 8px 0;
		position: absolute;
		z-index: 1;
		bottom: 125%;
		left: 50%;
		margin-left: -80px;
		}

		/* Popup arrow */
		.popup .popuptext::after {
		content: "";
		position: absolute;
		top: 100%;
		left: 50%;
		margin-left: -5px;
		border-width: 5px;
		border-style: solid;
		border-color: #555 transparent transparent transparent;
		}

		/* Toggle this class - hide and show the popup */
		.popup .show {
		visibility: visible;
		-webkit-animation: fadeIn 1s;
		animation: fadeIn 1s;
		}

		/* Add animation (fade in the popup) */
		@-webkit-keyframes fadeIn {
		from {opacity: 0;} 
		to {opacity: 1;}
		}

		@keyframes fadeIn {
		from {opacity: 0;}
		to {opacity:1 ;}
		}
	</style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?=base_url()?>/admin/places">
                            <img src="<?=base_url()?>/assets/images/icon/princ.jpg" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Menu</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
								<?php if($this->session->userdata('idUser')==null){ ?>
									<li>
										<a href="<?=base_url()?>user/acceuil">Places de parking</a>
									</li>
									<li>
										<a href="<?=base_url()?>user">Login</a>
									</li>
									<li>
										<a href="<?=base_url()?>user/inscription">Inscription</a>
									</li>
									
								<?php }else{ ?>
									<li>
										<a href="<?=base_url()?>user/acceuil">Places de parking</a>
									</li>
									<li>
										<a href="<?=base_url()?>user/alimentation">Ajouter de l'argent</a>
									</li>
									
								<?php } ?>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?=base_url()?>/user/acceuil">
                    <img src="<?=base_url()?>/assets/images/icon/princ.jpg" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Menu</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
								<?php if($this->session->userdata('idUser')==null){ ?>
									<li>
										<a href="<?=base_url()?>user/acceuil">Places de parking</a>
									</li>
									<li>
										<a href="<?=base_url()?>user">Login</a>
									</li>
									<li>
										<a href="<?=base_url()?>user/inscription">Inscription</a>
									</li>
									
								<?php }else{ ?>
									<li>
										<a href="<?=base_url()?>user/acceuil">Places de parking</a>
									</li>
									<li>
										<a href="<?=base_url()?>user/alimentation">Ajouter de l'argent</a>
									</li>
									
								<?php } ?>
                                
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
								
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?=base_url()?>/assets/images/icon/avatar-01.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
											<?php if($this->session->userdata('idUser') != null) {?>
														<?php $user = $this->Fonction_m->getuser($this->session->userdata('idUser')); ?>
														<a class="js-acc-btn" href="#"><?=$user['name']?> <?=$user['surname']?></a>
													<?php }else{ ?>
														<a class="js-acc-btn" href="#">Non connecté</a>
														<?php } ?>
                                            
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?=base_url()?>/assets/images/icon/avatar-01.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
													<?php if($this->session->userdata('idUser') != null) {?>
														<?php $user = $this->Fonction_m->getuser($this->session->userdata('idUser')); ?>
														<h5 class="name">
															<a href="#"><?=$user['name']?> <?=$user['surname']?></a>
														</h5>
													<?php }else{ ?>
															<h5 class="name">
																<a href="#">Non connecté</a>
															</h5>
															<a href="<?=base_url()?>user"><span class="email">se connecter</span></a>
														<?php } ?>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
											<?php if($this->session->userdata('idUser') != null) {?>
												<div class="account-dropdown__footer">
													<a href="<?php echo base_url()?>user/logout">
														<i class="zmdi zmdi-power"></i>Logout</a>
												</div>
											<?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

