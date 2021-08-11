<?php $title = 'Compte';
require_once('main.php');

require('../controller/controllerClient.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Ajout Compte</h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire Validation Compte</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerClient.php">
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-1">Nom </label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="nomSociet" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Adresse</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="adresse" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-1">Email</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="mail" minlength="2" type="email" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Téléphone</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="telCompt" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnClient">Ajouter</button>
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
  <!-- /row -->
</section>
<?php require_once('foot.php'); ?>