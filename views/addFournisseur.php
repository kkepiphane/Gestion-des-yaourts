<?php $title = 'Fournisseurs';
require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerFournisseur.php');
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
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerFournisseur.php">
            <div class="row">
              <div class="col-xs-5 col-sm-5">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Nom </label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="nomFour" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Adresse</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="adresseFour" minlength="2" type="text" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-5 col-sm-5">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Téléphone</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="telephoneFour" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Type Fournisseur</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="typeFour">
                      <option>------------</option>
                      <option value="Etrangé">Etrangé</option>
                      <option value="Locaux">Locaux</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnFourn">Ajouter</button>
                <button class="btn btn-theme04" onclick="document.location.reload()" type="reset">Annuler</button>
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
        <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout d'un Fournisseur</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Nom Fournisseur</th>
              <th>Adresse</th>
              <th>Téléphone</th>
              <th>Type Fournisseur</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aaFourni as $echoF) : ?>
              <tr>
                <td><?= $echoF->nom_four; ?></td>
                <td><?= $echoF->adresse_four; ?></td>
                <td><?= $echoF->tel_four; ?></td>
                <td><?= $echoF->typeFourni; ?></td>
                <td>
                  <a href="upFournisseur.php?idUpdCompte=<?= $echoF->id_four; ?>" onclick="return confirm('Etes-vous sûr de vouloir modifier le Founisseur : <?= $echoF->nom_four; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerFournisseur.php?idDelFornni=<?= $echoF->id_four; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer le Founisseur : <?= $echoF->nom_four; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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