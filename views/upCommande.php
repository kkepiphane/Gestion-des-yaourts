<?php $title = 'Commande';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerCommande.php');
require('../controller/controllerClient.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Commande - Modification</h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Modification</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upCommande.php?idUpdCom=<?= $lireUpdCom->id_com; ?>">
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Date Commande</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="dateCom" minlength="2" type="date" value="<?= $lireUpdCom->date_com; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Nom du Client</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="nclient">
                      <option value="<?= $lireUpdCom->id_client; ?>"><?= $lireUpdCom->nom_client; ?></option>
                      <?php foreach ($allClient as $echoForeiKeyClt) : ?>
                        <option value="<?= $echoForeiKeyClt->id_client; ?>"><?= $echoForeiKeyClt->nom_client; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Produit</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="produit">
                      <option value="<?= $lireUpdCom->id_prod; ?>"><?= $lireUpdCom->id_yaourt; ?></option>
                      <?php foreach ($allProds as $echoForeiKeyClt) : ?>
                        <option value="<?= $echoForeiKeyClt->id_prod; ?>"><?= $echoForeiKeyClt->id_yaourt; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Quantité</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="quantite" minlength="2" type="number" value="<?= $lireUpdCom->quantite; ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-1 col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnUpdCom">Modifier</button>
                <a href="listeCommande.php" class="btn btn-theme04" type="reset">Retour</a>
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