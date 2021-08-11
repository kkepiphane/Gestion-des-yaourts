<?php $title = 'Fournisseurs';
require_once('main.php');

require('../controller/controllerClient.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Fournisseurs - ajout </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire Validation Fournisseurs</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerClient.php">
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Nom </label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="nomClt" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Téléphone</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="telephone" minlength="2" type="number" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Adresse</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="adresse" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnFourn">Ajouter</button>
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
        <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout d'un client</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Nom Client</th>
              <th>Téléphone</th>
              <th>Adresse</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aaClient as $echoClts) : ?>
              <tr>
                <td><?= $echoClts->nom_client; ?></td>
                <td><?= $echoClts->telephone; ?></td>
                <td><?= $echoClts->adresse_client; ?></td>
                <td>
                  <a href="upClient.php?id_clt=<?= $echoClts->id_client; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="addClient.php?id_Dclt=<?= $echoClts->id_client; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
<?php require_once('foot.php'); ?>