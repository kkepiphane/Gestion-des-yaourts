<?php $title = 'Produit';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerProduit.php');
require('../controller/controllerYaourt.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Produit - Modification </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Modification</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upProduit.php?idUpdProd=<?= $lireUpdProd->id_prod; ?>">
            <div class="row">
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Ref Produit</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="quantitePro" minlength="2" type="text" value="<?= $lireUpdProd->ref_Pro; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Yaourt</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="yaourt">
                      <option value="<?= $lireUpdProd->id_yaourt; ?>"><?= $lireUpdProd->id_yaourt; ?></option>
                      <?php foreach ($allYaourts as $echoProY) :; ?>
                        <option value="<?= $echoProY->id_yaourt; ?>"><?= $echoProY->id_yaourt; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Quantité</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="quantitePro" minlength="2" type="number" value="<?= $lireUpdProd->quantite_pro; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Prix Unitaire</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="prixUnitaire" minlength="2" type="number" value="<?= $lireUpdProd->prix_produit; ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnUpdProd">Modifier</button>
                <a href="addProduit.php" class="btn btn-theme04" type="reset">Retour</a>
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
  <!-- /row -->
</section>
<?php require('foot.php'); ?>