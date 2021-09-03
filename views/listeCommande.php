<?php $title = 'Commande';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerCommande.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Commande - Liste des Commandes</h3>
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4>
          <div class="row">
            <div class="col-lg-6">
              <i class="fa fa-angle-right"></i><b>Listes des commande disponible</b>
            </div>
            <div class="col-lg-3">
              <a href="commandLiv.php" class="btn btn-success outline" title="Cliqué pour faire livré"><i class="fa fa-hand-o-right"></i> faire Livré</a>
            </div>
            <div class="col-lg-2">
              <a href="addFacture.php" class="btn btn-warning outline" title="Cliqué pour faire la Facture"><i class="fa fa-hand-o-right"></i> faire La facture</a>
            </div>
          </div>
        </h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Référence</th>
              <th>Date Commande</th>
              <th>Status</th>
              <th> Ref Produit</th>
              <th> Produit</th>
              <th> Quantité</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($n_yLiv as $echoComD) : ?>
              <tr>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->reference_commande ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->date_com ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>">
                  <?php
                  $liv = $echoComD->livraison;
                  if ($liv == "non_livre") :; ?>
                    <span class="label label-warning label-mini">Non Livré</span>
                  <?php else : ?>
                    <span class="label label-info label-mini">Livré</span>
                  <?php endif; ?>
                </td>
                <?php
                $cltComid = $echoComD->id_com;
                $db = dbConnect();
                $query = $db->prepare("SELECT * FROM commande, produits, prod_commande, type_yaout WHERE type_yaout.id_ty = produits.id_yaourt AND prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod AND commande.id_com  = '" . $cltComid . "'");
                $query->execute();
                $idCltDate = $query->fetchall(PDO::FETCH_OBJ);

                foreach ($idCltDate as $dayClt) :;
                ?>
              <tr>
                <td><?= $dayClt->ref_yaourt; ?></td>
                <td><?= $dayClt->nom_yaourt; ?></td>
                <td><?= $dayClt->quantite_com ?></td>
              </tr>
            <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
  </div>
  <!-- /row -->
</section>
<?php require('foot.php'); ?>