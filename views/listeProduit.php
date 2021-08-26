<?php $title = 'Produit';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerProduit.php');
require('../controller/controllerYaourt.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Produit - Liste </h3>
  <!-- /row -->
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Listes des Produit disponible</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Yaourt</th>
              <th>Quantité Produit</th>
              <th>Prix</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $som = 0;
            foreach ($allProds as $echoListPro) :; ?>
              <tr>
                <td><?= $echoListPro->id_yaourt; ?></td>
                <td><?= $echoListPro->quantite_pro; ?></td>
                <td><?= $echoListPro->prix_produit; ?></td>
                <td><?= $echoListPro->quantite_pro * $echoListPro->prix_produit;
                    $som = $echoListPro->quantite_pro * $echoListPro->prix_produit + $som;
                    ?></td>
                <td>
                  <a href="upProduit.php?idUpdProd=<?= $echoListPro->id_prod; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerProduit.php?idDel_listePro=<?= $echoListPro->id_prod; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <th></th>
              <th></th>
              <th>Montant Total</th>
              <th><?= $som; ?></th>
            </tr>
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