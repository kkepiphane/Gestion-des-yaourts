<?php $title = 'upDate Livreur';
require('head.php');
require('header.php');
require('sibar.php');
require  '../controller/controllerLivreur.php';
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Modification des informations du Livreur : <?= $lireLivreur->nom_dis; ?></h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upLivreur.php?id_liv=<?= $lireLivreur->idLivreur; ?>">
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Nom </label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="nomLiv" minlength="2" type="text" value="<?= $lireLivreur->nom_dis; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Téléphone</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="telLivreur" minlength="2" type="text" value="<?= $lireLivreur->telephone_dis; ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-1 col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnUpLivreur">Modifer</button>
                <a href="listeLivreur.php" class="btn btn-theme04" type="reset">Retour</a>
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
<?php
require_once('foot.php');
?>