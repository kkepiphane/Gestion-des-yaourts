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
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upCommande.php?id_upd_Com=<?= $lire_upd_com->id_com; ?>">
            <div class="row">
              <div class="col-xs-5 col-sm-5">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Reférence Commande</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="ref_com" minlength="2" type="text" value="<?= $lire_upd_com->reference_commande; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Date Commande</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="dateCom" minlength="2" type="date" value="<?= $lire_upd_com->date_com; ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-1 col-lg-8">
                <button class="btn btn-theme" type="submit" name="btn_upd_com">Modifier</button>
                <a href="addCommande.php" class="btn btn-theme04" type="reset">Retour</a>
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