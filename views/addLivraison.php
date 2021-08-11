<?php $title = 'Livraison';
require('main.php');
require('../controller/controllerProduit.php');
require('../controller/controllerCommande.php');
require('../controller/controllerLivreur.php');
require('../controller/controllerClient.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Livraison - Ajout </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Validations</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerLivraison.php">
            <div class="row">
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Date Livraison</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Date Paiment</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="datePaie" minlength="2" type="date" />
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Nom du Client</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="nomClient">
                      <option>------------</option>
                      <?php foreach ($allClient as $echoFoerIng) : ?>
                        <option value="<?= $echoFoerIng->id_client; ?>"><?= $echoFoerIng->nom_client; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Nom du Livreur</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="nomLivreur">
                      <option>------------</option>
                      <?php foreach ($allLiv as $echoForLivreur) : ?>
                        <option value="<?= $echoForLivreur->idLivreur; ?>"><?= $echoForLivreur->nom_dis; ?></option>
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
                    <select class="form-control" name="typeProd">
                      <option>------------</option>
                      <?php foreach ($allProds as $echoProduit) : ?>
                        <option value="<?= $echoProduit->id_prod; ?>"><?= $echoProduit->nom_yaourt; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Quantité</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="cname" name="quantitePro" minlength="2" type="number" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnAddDistribution">Ajouter</button>
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
            <?php foreach ($aDproduit as $echoLirePro) :; ?>
              <tr>
                <td><?= $echoLirePro->nom_yaourt; ?></td>
                <td><?= $echoLirePro->quantite_pro; ?></td>
                <td><?= $echoLirePro->prix_produit; ?></td>
                <td></td>
                <td>
                  <a href="" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                  <a href="upProduit.php?idUpdProd=<?= $echoLirePro->id_prod; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerProduit.php?idDel_Prod=<?= $echoLirePro->id_prod; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
<?php require('foot.php'); ?>