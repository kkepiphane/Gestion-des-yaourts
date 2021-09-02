<?php $title = 'update Type Yaourt';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerTYaourt.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Modification du : <?= $lireTYaoutUp->nom_yaourt; ?></h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Form Yaourt</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upType_yaourt.php?id_upd_TY=<?= $lireTYaoutUp->id_ty; ?>">
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Ref <?= $getN->produitGest; ?></label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="Refy" minlength="2" type="text" value="<?= $lireTYaoutUp->ref_yaourt; ?>" />
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Type <?= $getN->produitGest; ?></label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="typeY" minlength="2" type="text" value="<?= $lireTYaoutUp->nom_yaourt; ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btn_upd_TY">Modifier</button>
                <a href="addType_yaourt.php" class="btn btn-theme04" type="reset">Retour</a>
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
<?php require('foot.php') ?>