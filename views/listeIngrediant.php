<?php $title = 'add Ingrédiant';
require('head.php');
require('header.php');
require('sibar.php');

require  '../controller/controllerIngrediant.php';
?>

<section class="wrapper">
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Listes de tout les Ingrédiants</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Réferences</th>
              <th> Nom d'ingrédiant</th>
              <th>Fournisseurs</th>
              <th>Quantité</th>
              <th> Prix Unitaire</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aDing as $lireDIng) : ?>
              <tr>
                <td><?= $lireDIng->references_ing; ?></td>
                <td><?= $lireDIng->nom_ing; ?></td>
                <td><?= $lireDIng->nom_four; ?></td>
                <td><?= $lireDIng->quantite_dispo; ?> <?= $lireDIng->uniteMesure; ?></td>
                <td><?= $lireDIng->prixUnitaire; ?></td>
                <td><?= $lireDIng->quantite_dispo * $lireDIng->prixUnitaire; ?></td>
                <td>
                  <a href="upIngrediant.php?idUpIng=<?= $lireDIng->id_ing; ?>" onclick="return confirm('Êtes-vous sûr de vouloir apporter de modification à cet ingrédiant : <?= $lireDIng->nom_ing; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerIngrediant.php?idDelLIng=<?= $lireDIng->id_ing; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ingrédiant  : <?= $lireDIng->nom_ing; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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