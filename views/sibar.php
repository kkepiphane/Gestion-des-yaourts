<!--header end-->
<!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<?php $nav_en_cours = 'rubrique1'; ?>
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
          <i class="fa fa-th"></i>
          <span>Données</span>
        </a>
        <ul class="sub">
          <li><a href="addCompte.php"><i class="fa fa-asterisk"></i>Société</a></li>
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
          <li><a href="addFactureAchat.php">Factures des achats</a></li>
          <li><a href="listeFactureAchat.php">liste Factures des achats</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-cogs"></i>
          <span>Production</span>
        </a>
        <ul class="sub">
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-folder-open"></i>
              <span>Préparation</span>
            </a>
            <ul class="sub">
              <li><a href="addType_yaourt.php">Type de Produit</a></li>
              <li><a href="addYaourt.php">Préparation Produit</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-folder-open"></i>
              <span>Produit Fini</span>
            </a>
            <ul class="sub">
              <li><a href="addProduit.php">Ajout Produits Vendre</a></li>
              <li><a href="listeProduit.php">Liste Produit</a></li>
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
              <li><a href="bon_de_livraison.php">Bon de Livraison</a></li>
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
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-cog"></i>
          <span>Paramètre</span>
        </a>
        <ul class="sub">
          <li><a href="addFacture.php">Vérification des stock</a></li>
          <li><a href="addSystemNot.php">Système de Notifications</a></li>
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