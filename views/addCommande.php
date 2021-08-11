<?php $title = 'Commande';
 require ('main.php'); 
 require('../controller/controllerCommande.php');
 require('../controller/controllerClient.php');
 require('../controller/controllerProduit.php');
 ?>

      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Commande - ajout</h3>
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4><i class="fa fa-angle-right"></i> Formulaire de Validation</h4>
            <hr>
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerCommande.php">
                    <div class="row"> 
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Date Commande</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="dateCom" minlength="2" type="date" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nom du Client</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="nclient">
                                    <option>------------</option>
                                  <?php foreach($allClient as $echoForeiKeyClt):?>
                                    <option value="<?=$echoForeiKeyClt->id_client;?>"><?=$echoForeiKeyClt->nom_client;?></option>
                                    <?php endforeach;?>
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
                                <select class="form-control" name="produit">
                                <option>------------</option>
                                  <?php foreach($allProds as $echoForeiKeyClt):?>
                                    <option value="<?=$echoForeiKeyClt->id_prod;?>"><?=$echoForeiKeyClt->nom_yaourt;?></option>
                                    <?php endforeach;?>
                                </select>
                                </div>
                            </div>
                         </div> 
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Quantité</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="quantite" minlength="2" type="number" required/>
                                </div>
                            </div>
                         </div> 
                    </div>
                  <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-8">
                      <button class="btn btn-theme" type="submit" name="btnAddComm">Ajouter</button>
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
                <h4><i class="fa fa-angle-right"></i> Listes de dernière Commandes</h4>
                <hr>
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Date Commande</th>
                    <th> Client</th>
                    <th> Produit</th>
                    <th> Quantité</th>
                    <th>Livraison</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($aDcoms as $echoComD):?>
                  <tr>
                    <td><?=$echoComD->date_com?></td>
                    <td><?=$echoComD->nom_client ?></td>
                    <td><?=$echoComD->nom_yaourt?></td>
                    <td><?=$echoComD->quantite?></td>
                    <td>
                      <a href="addLivraison.php?idAddDistribtion=<?=$echoComD->id_com?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                    </td>
                    <td>
                      <a href="upCommande.php?idUpdCom=<?=$echoComD->id_com?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="../controller/controllerCommande.php?idDel_com=<?=$echoComD->id_com?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
      <?php require ('foot.php');?>