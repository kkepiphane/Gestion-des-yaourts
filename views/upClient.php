<?php $title = 'Client';
require('head.php');
require('header.php');
require('sibar.php');

require  '../controller/controllerClient.php';

?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Modification des informations du Client : <?= $lireClient->nom_client; ?></h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire Validation Client</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upClient.php?id_clt=<?= $lireClient->id_client; ?>">
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Nom </label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="nomClt" minlength="2" type="text" value="<?= $lireClient->nom_client; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Adresse</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="adresse" minlength="2" type="text" value="<?= $lireClient->adresse_client; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Téléphone</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="telephone" minlength="2" type="text" value="<?= $lireClient->telephone; ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnUpClient">Modifier</button>
                <a href="listeClient.php" class="btn btn-theme04" type="reset">Cancel</a>
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