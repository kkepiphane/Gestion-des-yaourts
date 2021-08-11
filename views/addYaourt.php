<?php $title = 'Composition Yaourt';?>
  <?php require ('main.php');
   require('../controller/controllerYaourt.php');
   require('../controller/controllerIngrediant.php');
   require('../controller/controllerTYaourt.php');
?>

      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> AJOUT YAOURT</h3>
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4><i class="fa fa-angle-right"></i> Form Validations</h4>
            <hr>
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerYaourt.php">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Type de Yaourt</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="typeYaourt">
                                    <option>------------</option>
                                    <?php foreach ($allTYaout as $echoFoerTypeY):?>
                                    <option value="<?=$echoFoerTypeY->id_ty;?>"><?=$echoFoerTypeY->nom_yaourt;?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                         </div> 
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Type d'ingrédiant</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="typeIng">
                                    <option>------------</option>
                                    <?php foreach ($allIng as $echoFoerIng):?>
                                    <option value="<?=$echoFoerIng->id_ing;?>"><?=$echoFoerIng->nom_ing;?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Quantité Produit</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="quantiteY" minlength="2" type="number"  required />
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
                  <?php foreach($aDYaourts as $echYa):?>
                  <tr>
                    <td><?=$echYa->nom_yaourt;?></td>
                    <td><?=$echYa->nom_ing;?></td>
                    <td><?=$echYa->quantiteDispoY;?></td>
                    <td>
                      <a href="upYaourt.php?idUpYa=<?=$echYa->id_yaourt;?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="../controller/controllerYaourt.php?idDelYa=<?=$echYa->id_yaourt;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
      <?php require ('foot.php')?>