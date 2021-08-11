<?php

/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */

// Start Session
session_start();

// check user login
if (empty($_SESSION['id'])) {
  header("Location:login.php");
}



// Application library ( with DemoLib class )
require  '../models/modelLogin.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['id']); // get user details

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title><?= $title ?> - KCMG</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>KCM<span>Gestion</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">1</span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                    <span class="from">Zac Snider</span>
                    <span class="time">Just now</span>
                  </span>
                  <span class="message">
                    Hi mate, how is everything?
                  </span>
                </a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">1</span>
            </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 1 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php"><i class="fa fa-power-off"></i></a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?= $user->username;
                                $_SESSION['nom_user'] = $user->username;
                                ?></h5>
          <li class="mt">
            <a class="active" href="accueil.php">
              <i class="fa fa-home"></i>
              <span>Tableau de Bord</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cog"></i>
              <span>Données</span>
            </a>
            <ul class="sub">
              <li><a href="compte.php">Société</a></li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-user"></i>
                  <span>Clients</span>
                </a>
                <ul class="sub">
                  <li><a href="addClient.php">Add Clients</a></li>
                  <li><a href="listeClient.php">Listes des Clients</a></li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-user"></i>
                  <span>Fournisseurs</span>
                </a>
                <ul class="sub">
                  <li><a href="addFournisseur.php">Add Fournisseur</a></li>
                  <li><a href="listeFournisseur.php">Listes Fournisseurs</a></li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-truck"></i>
                  <span>Livreur</span>
                </a>
                <ul class="sub">
                  <li><a href="addLivreur.php">add Livreur</a></li>
                  <li><a href="listeLivreur.php">Liste des Livreurs</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-shopping-cart"></i>
              <span>Approvisionnement</span>
            </a>
            <ul class="sub">
              <li><a href="addIngrediant.php">Ajout des Ingrédiants</a></li>
              <li><a href="panels.html">Factures des achats</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Production</span>
            </a>
            <ul class="sub">
              <li><a href="addProduit.php">ajout des Produits</a></li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-folder-open"></i>
                  <span>Yaourt</span>
                </a>
                <ul class="sub">
                  <li><a href="composition.php">Yaourt & Composition</a></li>
                  <li><a href="addYaourt.php">Yaourt</a></li>
                  <li><a href="addType_yaourt.php">Type de Yaourt</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-folder-open"></i>
              <span>Distributions</span>
            </a>
            <ul class="sub">
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-truck"></i>
                  <span>Commande</span>
                </a>
                <ul class="sub">
                  <li><a href="addCommande.php">add Commandes</a></li>
                  <li><a href="listeCommande.php">Listes Commandes</a></li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-truck"></i>
                  <span>Livraison</span>
                </a>
                <ul class="sub">
                  <li><a href="addLivraison.php">Livraison</a></li>
                  <li><a href="listeLivraison.php">Listes des Livraison</a></li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-credit-card"></i>
                  <span>Paiement</span>
                </a>
                <ul class="sub">
                  <li><a href="addFacture.php">Facture</a></li>
                  <li><a href="advanced_form_components.html">Advanced Components</a></li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-credit-card"></i>
                  <span>Paramètre</span>
                </a>
                <ul class="sub">
                  <li><a href="addFacture.php">Facture</a></li>
                  <li><a href="advanced_form_components.html">Advanced Components</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <!-- /row -->