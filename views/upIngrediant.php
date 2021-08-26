<?php $title = 'Ingrédiant';
require('head.php');
require('header.php');
require('sibar.php');

require  '../controller/controllerIngrediant.php';
require('../controller/controllerFournisseur.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Modification : <?= $lireIngreD->nom_ing; ?></h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Modification</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upIngrediant.php?idUpIng=<?= $lireIngreD->id_ing; ?>">
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Réferences</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="refIng" minlength="2" type="text" value="<?= $lireIngreD->references_ing; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Ingrédiant</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="nomIng" minlength="2" type="text" value="<?= $lireIngreD->nom_ing; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Fournisseurs</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="fourni">
                      <option Value="<?= $lireIngreD->id_four; ?>"><?= $lireIngreD->nom_four; ?></option>
                      <?php foreach ($allFournis as $FourniLire) : ?>
                        <option value="<?= $FourniLire->id_four; ?>"><?= $FourniLire->nom_four; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Prix Unitaire</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="prixU" minlength="2" type="number" value="<?= $lireIngreD->prixUnitaire; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Quantité</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="quantiteIng" minlength="2" type="number" value="<?= $lireIngreD->quantite_dispo; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Unité de Mesure</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="mesure">
                      <option value="<?= $lireIngreD->uniteMesure; ?>"><?= $lireIngreD->uniteMesure; ?></option>
                      <option value="Kg">Kg</option>
                      <option value="g">g</option>
                      <option value="l">l</option>
                      <option value="ml">ml</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-1 col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnUpIng">Modifier</button>
                <a href="listeIngrediant.php" class="btn btn-theme04" type="reset">Retour</a>
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
</section>
<?php require('foot.php'); ?>