<?php $title = 'Yaourt'; ?>
<?php require('main.php');
require('../controller/controllerYaourt.php');
require('../controller/controllerTYaourt.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>YAOURT - Modification</h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Form Validations</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upYaourt.php?idUpYa=<?= $lireYaoutUps->id_yaourt; ?>">
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Type de Yaourt</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="typeYaourt">
                      <option value="<?= $lireYaoutUps->id_ty; ?>"><?= $lireYaoutUps->nom_yaourt; ?></option>
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
                      <option value="<?= $lireYaoutUps->id_ingred_achts; ?>"><?= $lireYaoutUps->nom_ing; ?></option>
                      <?php foreach ($allIngred as $echoFoerIng) : ?>
                        <option value="<?= $echoFoerIng->id_ing; ?>"><?= $echoFoerIng->nom_ing; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Quantité Disponible</label>
                  <div class="col-lg-7" id="quantiteDispo">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Quantité Produit</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="quantiteY" minlength="2" type="number" value="<?= $lireYaoutUps->quantiteDispoY; ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-1 col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnUpYa" onclick="return confirm('Êtes-vous sûr de vouloir Modifier ce Yaourt')">Modifier</button>
                <a href="listeYaourts.php" class="btn btn-theme04" type="reset">Retour</a>
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

<script type="text/javascript">
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

  $('#cname').change(function() {
    number = $('#cname').val()
    num = $('#QuantiteD').val()
    if (number <= 0 || number > num) {
      $("input[name='quantiteY']").val("");
      alert("la quantité n'est assez veuillez verifié le stock");
    }
  });
</script>