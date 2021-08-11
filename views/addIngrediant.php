<?php $title = 'add Ingrédiant';
require('main.php');

require  '../controller/controllerIngrediant.php';
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Ajout d'un ingrédiant</h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Form Validations</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerIngrediant.php">
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Ingrédiant</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="nomIng" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Prix Unitaire</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="prixU" minlength="2" type="number" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Quantité</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="quantiteIng" minlength="2" type="number" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-1 col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnAddIng">Ajouter</button>
                <button class="btn btn-theme04" type="reset">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
  </div>
  <!-- /row -->
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th> Nom d'ingrédiant</th>
              <th>Quantité</th>
              <th> Prix Unitaire</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aDing as $lireDIng) : ?>
              <tr>
                <td><?= $lireDIng->nom_ing; ?></td>
                <td><?= $lireDIng->quantite_dispo; ?></td>
                <td><?= $lireDIng->prixUnitaire; ?></td>
                <td></td>
                <td>
                  <a href="upIngrediant.php?idUpIng=<?= $lireDIng->id_ing; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerIngrediant.php?idDelIng=<?= $lireDIng->id_ing; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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