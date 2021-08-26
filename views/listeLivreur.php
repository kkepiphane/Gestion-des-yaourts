<?php $title = 'Add Livreur';
require('head.php');
require('header.php');
require('sibar.php');
require  '../controller/controllerLivreur.php';
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Liste de tout les Livreurs </h3>
  <!-- /row -->
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout d'un livreur</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Nom Livreur</th>
              <th>Téléphone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allLiv as $echoLiv) :; ?>
              <tr>
                <td><?= $echoLiv->nom_dis; ?></td>
                <td><?= $echoLiv->telephone_dis; ?></td>
                <td>
                  <a href="upLivreur.php?id_liv=<?= $echoLiv->idLivreur; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerLivreur.php?id_dLLiv=<?= $echoLiv->idLivreur; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
<?php
require_once('foot.php');
?>