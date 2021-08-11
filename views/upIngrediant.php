<?php $title = 'add Ingrédiant';
 require ('main.php');
 
 require  '../controller/controllerIngrediant.php';
?>

      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Modification des données d'ingrédiant:<?= $lireIngreD->nom_ing;?></h3>
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4><i class="fa fa-angle-right"></i> Form Validations</h4>
            <hr>
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upIngrediant.php?idUpIng=<?= $lireIngreD->id_ing;?>">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Ingrédiant</label>
                                <div class="col-lg-8">
                                 <input class=" form-control" id="cname" name="nomIng" minlength="2" type="text" value="<?= $lireIngreD->nom_ing;?>" />
                                </div>
                            </div>
                         </div> 
                        <div class="col-xs-6 col-sm-6">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Prix Unitaire</label>
                                <div class="col-lg-8">
                                 <input class=" form-control" id="cname" name="prixU" minlength="2" type="number" value="<?= $lireIngreD->prixUnitaire;?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Quantité</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="quantiteIng" minlength="2" type="number"  value="<?= $lireIngreD->quantite_dispo;?>" />
                                </div>
                            </div>
                         </div> 
                        <div class="col-xs-6 col-sm-6">
                        </div>
                    </div>
                  <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-8">
                      <button class="btn btn-theme" type="submit" name="btnUpIng">Modifier</button>
                      <a href="listeIngrediant.php" class="btn btn-theme04" type="reset">Cancel</a>
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
      </section>
      <?php require ('foot.php');?>