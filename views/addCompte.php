<?php $title = 'Mon Compte';
require_once('main.php');

require('../controller/controllerCompte.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Compte Société</h3>
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i>Mon Compte</h4>
        <hr>
        <?php foreach ($aaCompte as $Compte) :; ?>
          <div class="row">
            <div class="col-xs-6 col-sm-6">
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Nom :</label>
                <div class="col-lg-6">
                  <?= $Compte->nom_societe; ?>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6">
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Email : </label>
                <div class="col-lg-6">
                  <?= $Compte->emailSocet; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-6">
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Adresse : </label>
                <div class="col-lg-6">
                  <?= $Compte->adresseSociet; ?>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6">
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Téléphone : </label>
                <div class="col-lg-6">
                  <?= $Compte->telComp; ?>
                </div>
              </div>
            </div>
          </div>
          <br>
          &copy;<?= $Compte->nom_societe; ?>
          <div class="pull-right">
            <a href="upCompte.php?idUpdCompte=<?= $Compte->id_compte; ?>" onclick="return confirm('Êtes-vous sûr de vouloir modifier les informations du compte : <?= $Compte->nom_societe; ?>')" class="btn btn-primary btn-xs" title="Edité le Compte"><i class="fa fa-pencil"></i></a>
          </div>
        <?php endforeach ?>
      </div>
      <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
  </div>
  <!-- FORM VALIDATION -->
  <?php if (empty($aaCompte)) : ?>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4><i class="fa fa-angle-right"></i> Formulaire Validation Compte</h4>
          <hr>
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerCompte.php">
              <div class="row">
                <div class="col-xs-6 col-sm-6">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Nom </label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="nomSociet" minlength="2" type="text" required />
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Email</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="mail" minlength="2" type="email" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4 col-sm-4">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Adresse</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="adresseSociet" minlength="2" type="text" required />
                    </div>
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Téléphone</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="telCompt" minlength="2" type="text" required />
                    </div>
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Produit</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="GestPro" minlength="2" type="text" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset col-lg-8">
                  <button class="btn btn-theme" type="submit" name="btnAddCompte">Ajouter</button>
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
  <?php endif ?>
  <!-- /row -->
  <!-- /row -->
</section>
<?php require_once('foot.php'); ?>