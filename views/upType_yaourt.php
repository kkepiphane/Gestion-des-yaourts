<?php $title = 'update Type Yaourt';
 require ('main.php');
 require('../controller/controllerTYaourt.php');
?>

      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Modification du : <?=$lireTYaoutUp->nom_yaourt; ?></h3>
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4><i class="fa fa-angle-right"></i> Form Yaourt</h4>
            <hr>
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upType_yaourt.php?idUpTYa=<?=$lireTYaoutUp->id_ty; ?>">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2"></label>
                                <div class="col-lg-8">
                               <br><br>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Type Yaourt</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="typeY" minlength="2" type="text"  value="<?=$lireTYaoutUp->nom_yaourt; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2"></label>
                                <div class="col-lg-8">
                                <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                    <div class="col-lg-offset-4 col-lg-8">
                      <button class="btn btn-theme" type="submit" name="btnUpTY">Modifier</button>
                      <a href="listeType_yaourt.php" class="btn btn-theme04" type="reset">Cancel</a>
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
      <?php require ('foot.php')?>