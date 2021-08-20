<?php $title = 'Type Yaourt';
require('main.php');
require('../controller/controllerTYaourt.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Type Yaourt </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Form Yaourt</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerTYaourt.php">
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Type Yaourt</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="typeY" minlength="2" type="text" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Type d'ingrédiant</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="TYIng">
                      <option>------------</option>
                      <?php foreach ($affichIn as $echoFoerIng) : ?>
                        <option value=" <?= $echoFoerIng->id_ing; ?>"><?= $echoFoerIng->nom_ing; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnAddTypeY">Ajouter</button>
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
        <h4><i class="fa fa-angle-right"></i> Listes des Yaourts</h4>
        <hr>
        <table class="table table-striped table-advance table-hover" width="100%" cellspacing="0" cellpadding="5">
          <thead>
            <tr>
              <th>Yaourt</th>
              <th>Type d'ingrédiant</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allTYaout as $echoTY) : ?>
              <tr>
                <td rowspan="<?= $echoTY->idTYao + 1; ?>">
                  <?= $echoTY->nom_yaourt; ?></td>
                <?php
                $aaaaaa = $echoTY->nom_yaourt;
                $db = dbConnect();
                $query = $db->prepare("SELECT * FROM type_yaout, ingrediants WHERE type_yaout.idIngred  = ingrediants.id_ing AND nom_yaourt LIKE '%" . $aaaaaa . "%'");
                $query->execute(array());
                $echI =  $query->fetchall(PDO::FETCH_OBJ);
                foreach ($echI as $echoTI) :
                ?>
              <tr>
                <td><?= $echoTI->nom_ing; ?></td>
                <td>
                  <a href="upType_yaourt.php?idUpTYa=<?= $echoTY->id_ty; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerTYaourt.php?idDelTY=<?= $echoTY->id_ty; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
              <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
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
<?php require('foot.php') ?>