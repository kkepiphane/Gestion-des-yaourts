<?php $title = 'Add Commande'?>

<?php ob_start(); ?>

      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Commande</h3>
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4><i class="fa fa-angle-right"></i> Formulaire de Commande</h4>
            <hr>
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Produit</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="produit">
                                    <option>------------</option>
                                    <option>2</option>
                                </select>
                                </div>
                            </div>
                         </div> 
                        <div class="col-xs-4 col-sm-4">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Client</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="client">
                                    <option>------------</option>
                                    <option>2</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Distributeur</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="distributeur">
                                    <option>------------</option>
                                    <option>2</option>
                                </select>
                                </div>
                            </div>
                         </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-xs-4 col-sm-4">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Date Commande</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="dateCom" minlength="2" type="date"   />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Date Livraison</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date"  />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Date Paiement</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date"  />
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-8">
                      <button class="btn btn-theme" type="submit">Ajouter</button>
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
                    <th> Produit</th>
                    <th> Client</th>
                    <th> Distributeur</th>
                    <th>Date Commande</th>
                    <th>Date Livraison</th>
                    <th>Date Commande</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="basic_table.html#">Company Ltd</a>
                    </td>
                    <td class="hidden-phone">Lorem Ipsum dolor</td>
                    <td>12000.00$ </td>
                    <td><span class="label label-info label-mini">Due</span></td>
                    <td>12222222$</td>
                    <td>
                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    </td>
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
      <?php $content = ob_get_clean();?>
 <?php  require 'main.php';?>