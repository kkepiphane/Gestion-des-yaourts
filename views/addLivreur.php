<?php $title = 'Add Livreur';
 require_once ('main.php');
 require  '../controller/controllerLivreur.php';
?>
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Ajout Livreur </h3>
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4><i class="fa fa-angle-right"></i> Formulaire</h4>
            <hr>
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerLivreur.php">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nom </label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="nomLiv" minlength="2" type="text"  required />
                                </div>
                            </div>
                         </div> 
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Téléphone</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="telLivreur" minlength="2" type="number"  required />
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-8">
                      <button class="btn btn-theme" type="submit" name="btnAddLiv">Ajouter</button>
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
                <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout d'un livreur</h4>
                <hr>
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Nom Livreur</th>
                    <th>Téléphone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($daLiv as $echoLiv):;?>
                  <tr>
                    <td><?=$echoLiv->nom_dis ;?></td>
                    <td><?=$echoLiv->telephone_dis ;?></td>
                    <td>
                      <a href="upLivreur.php?id_liv=<?=$echoLiv->idLivreur;?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="../controller/controllerLivreur.php?id_dLiv=<?=$echoLiv->idLivreur ;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
      <?php 
 require_once ('foot.php');
?>