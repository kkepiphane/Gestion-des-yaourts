<?php $title = 'Commande';
require('main.php');
require('../controller/controllerCommande.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Commande - Liste</h3>
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Listes des commande disponible</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Date Commande</th>
              <th> Client</th>
              <th> Produit</th>
              <th> Quantité</th>
              <th>Livraison</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allComs as $echoComD) : ?>
              <tr>
                <td><?= $echoComD->date_com ?></td>
                <td><?= $echoComD->nom_client ?></td>
                <td><?= $echoComD->nom_yaourt ?></td>
                <td><?= $echoComD->quantite ?></td>
                <td>
                  <a href="livraison.php?idAddDistribtion=<?= $echoComD->id_com ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                </td>
                <td>
                  <a href="upCommande.php?idUpdCom=<?= $echoComD->id_com ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerCommande.php?idDel_listCom=<?= $echoComD->id_com ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
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