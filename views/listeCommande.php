<?php $title = 'Commande';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerCommande.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Commande - Liste</h3>
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4>
          <div class="col-lg-6">
            <i class="fa fa-angle-right"></i><b>Listes des commande disponible</b>
          </div>
          <div class="col-lg-4-right">
            <a href="commandLiv.php" class="btn btn-success btn-xs">Livrasion des Commande</a>
          </div>
        </h4>
        <hr>

        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Référence</th>
              <th>Date Commande</th>
              <th> Client</th>
              <th>Livraison</th>
              <th> Produit</th>
              <th> Quantité</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aDcoms as $echoComD) : ?>
              <tr>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->reference_commande ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->date_com ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->nom_client ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>">
                  <a href="upCommande.php?idUpdCom=<?= $echoComD->id_com ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                </td>
                <?php
                $echoComD->comptDate;
                $dateCom = $echoComD->date_com;
                $cltCom = $echoComD->id_clt;
                $db = dbConnect();
                $query = $db->prepare("SELECT * FROM commande, produits, clients, prod_commande WHERE prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod AND commande.id_clt = clients.id_client AND livraison like '%non_livre%' AND commande.date_com = '" . $dateCom . "' AND commande.id_clt = '" . $cltCom . "'");
                $query->execute();
                $idCltDate = $query->fetchall(PDO::FETCH_OBJ);

                foreach ($idCltDate as $dayClt) :;
                ?>
              <tr>
                <td><?= $dayClt->id_yaourt ?></td>
                <td><?= $dayClt->quantite_com ?></td>
                <td>
                  <a href="../controller/controllerCommande.php?idDel_com=<?= $dayClt->id_prd_q_com ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce produit : <?= $dayClt->id_yaourt; ?> dans les commandes')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
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