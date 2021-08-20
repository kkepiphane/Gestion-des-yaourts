<?php $title = 'Produit';
require('main.php');
require('../controller/controllerProduit.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Produit - Ajout </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Validations</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerProduit.php">
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Yaourt</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="yaourt">
                      <option>------------</option>
                      <?php foreach ($allGroupPro as $echoProY) :; ?>
                        <option value="<?= $echoProY->id_yaourt; ?>"><?= $echoProY->nom_yaourt; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Quantité</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="quantitePro" minlength="2" type="number" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Prix Unitaire</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="prixUnitaire" minlength="2" type="number" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnAddProd">Ajouter</button>
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
        <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Yaourt</th>
              <th>Quantité Produit</th>
              <th>Prix</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $som = 0;
            foreach ($aDproduit as $echoLirePro) :; ?>
              <tr>
                <td><?= $echoLirePro->nom_yaourt; ?></td>
                <td><?= $echoLirePro->quantite_pro; ?></td>
                <td><?= $echoLirePro->prix_produit; ?></td>
                <td><?= $echoLirePro->quantite_pro * $echoLirePro->prix_produit;
                    $som = $echoLirePro->quantite_pro * $echoLirePro->prix_produit + $som;
                    ?></td>
                <td>
                  <a href="upProduit.php?idUpdProd=<?= $echoLirePro->id_prod; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerProduit.php?idDel_Prod=<?= $echoLirePro->id_prod; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
              </tr>
            <?php endforeach; ?>

            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <th></th>
              <th></th>
              <th>Montant Total</th>
              <th><?= $som; ?></th>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
  </div>
  <!-- /row -->
</section>
<?php require('foot.php'); ?>