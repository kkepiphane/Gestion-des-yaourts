<?php $title = 'Composition';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerYaourt.php');
require('../controller/controllerTYaourt.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i><?= $getN->produitGest; ?> - Ajout </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Validations</h4>
        <hr>
        <?php if (!isset($_POST['btnIdYa'])) :; ?>
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="">
              <div class="row">
                <div class="col-xs-4 col-sm-4">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-4">Type Produit</label>
                    <div class="col-lg-7">
                      <select class="form-control" name="typeYaourt">
                        <option>------------</option>
                        <?php foreach ($allTYa as $echoFoerTypeY) : ?>
                          <option value="<?= $echoFoerTypeY->id_typeY; ?>"><?= $echoFoerTypeY->nom_yaourt; ?> - <?= $echoFoerTypeY->ref_yaourt; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4">
                  <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-8">
                      <button class="btn btn-theme" type="submit" name="btnIdYa">Ajouter</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          <?php else :; ?>
            <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="">
              <?php
              foreach ($lisIng as $echoFoerIng) : ?>
                <div class="row">
                  <div class="col-xs-4 col-sm-4">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-4">Type d'ingrédiant</label>
                      <div class="col-lg-7" id="idTIii">
                        <select class="form-control" name="typeIng[]" onchange="selectIngrediant(this.value)">
                          <option value=" <?= $echoFoerIng->id_typeI; ?>"><?= $echoFoerIng->nom_ing; ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <?php
                  $inG = $echoFoerIng->id_typeI;
                  $db = dbConnect();
                  $query = $db->prepare("SELECT COUNT(prod_fac_achats.id_ingred_achts) AS Compt , SUM(quantite_act) AS Quantite FROM prod_fac_achats WHERE id_ingred_achts = '" . $inG . "' GROUP BY id_ingred_achts");
                  $query->execute();
                  $recapQauntite = $query->fetch(PDO::FETCH_OBJ);
                  ?>
                  <div class="col-xs-4 col-sm-4">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-5">Quantité Disponible</label>
                      <div class="col-lg-3" id="quantiteDispo">
                        <input class=" form-control" minlength="2" id="QuantiteD" name="quantiteSou[]" type="text" value="<?= $recapQauntite->Quantite; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-4 col-sm-4">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-5">Quantité à Produit</label>
                      <div class="col-lg-7">
                        <input class=" form-control" id="recap" name="quantiteY[]" minlength="2" min="1" max="" type="number" required />
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              <div class="form-group">
                <div class="col-lg-offset col-lg-8">
                  <button class="btn btn-theme" type="submit" name="btnAddYa">Enregistrer</button>
                  <button class="btn btn-theme04" name="annuler">Annuler</button>
                </div>
              </div>
            </form>
          </div>
        <?php endif; ?>
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
              <th>Ingrédiant</th>
              <th>Quantité</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aDYaourts as $echYa) : ?>
              <tr>
                <td><?= $echYa->nom_yaourt; ?></td>
                <td><?= $echYa->nom_ing; ?></td>
                <td><?= $echYa->quantiteDispoY; ?></td>
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
<?php require('foot.php') ?>

<script type="text/javascript">
  //Cette fonction permet de vérifier la quantité de produit
  function selectTypeProduit(id) {
    $('#idTIii').html('');
    $.ajax({
      type: 'POST',
      url: '../controller/controllerYaourt.php',
      data: {
        YaourtIdd: id
      },
      success: function(data) {
        $('#idTIii').html(data);
      }
    })
  }
  //Cette fonction permet de vérifier la quantité de produit
  function selectIngrediant(id) {
    $('#quantiteDispo').html('');
    $.ajax({
      type: 'POST',
      url: '../controller/controllerYaourt.php',
      data: {
        id_ingred: id
      },
      success: function(data) {
        $('#quantiteDispo').html(data);
      }
    })
  }
  //Cette fonction permet de vérifier la valeur supérieur ou inférieur
  $('#recap').change(function() {
    $(document).ready(function() {
      $("input").attr({
        "max": $('#QuantiteD').val(),
        "min": 1
      });
    });
  });
</script>