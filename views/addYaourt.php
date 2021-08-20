<?php $title = 'Composition Yaourt'; ?>
<?php require('main.php');
require('../controller/controllerYaourt.php');
require('../controller/controllerTYaourt.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>YAOURT - Ajout </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Validations</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerYaourt.php">
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Type Yaourt</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="typeYaourt">
                      <option>------------</option>
                      <?php foreach ($allTYaout as $echoFoerTypeY) : ?>
                        <option value="<?= $echoFoerTypeY->id_ty; ?>"><?= $echoFoerTypeY->nom_yaourt; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Type d'ingrédiant</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="typeIng" onchange="selectIngrediant(this.value)">
                      <option>------------</option>
                      <?php foreach ($allIngred as $echoFoerIng) : ?>
                        <option value=" <?= $echoFoerIng->id_ing; ?>"><?= $echoFoerIng->nom_ing; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-5">Quantité Disponible</label>
                  <div class="col-lg-3" id="quantiteDispo">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Quantité à Produit</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="recap" name="quantiteY" minlength="2" min="1" max="" type="number" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-1 col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnAddYa">Ajouter</button>
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