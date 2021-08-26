<?php $title = 'Composition Yaourt';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerYaourt.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Liste de tous les YAOURT</h3>
  <!-- /row -->
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Listes des Yaourt</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Yaourt</th>
              <th>Ingrédiant</th>
              <th>Quantité</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allYaourts as $echYa) : ?>
              <tr>
                <td><?= $echYa->nom_yaourt; ?></td>
                <td><?= $echYa->nom_ing; ?></td>
                <td><?= $echYa->quantiteDispoY; ?></td>
                <td>
                  <a href="upYaourt.php?idUpYa=<?= $echYa->id_yaourt; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerYaourt.php?idDelLYa=<?= $echYa->id_yaourt; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
<?php require('foot.php') ?>