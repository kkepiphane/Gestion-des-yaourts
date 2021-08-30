<?php $title = 'Facture';

require('head.php');
require('header.php');
require('sibar.php');
?>

<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Facture Commande</h3>
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
                                    <label for="cname" class="control-label col-lg-3">Ref Facture</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="cname" name="ref_fact_com" minlength="2" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Distribution</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="CommandeID">
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
                                        <select class="form-control" name="IdClient">
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
                                    <label for="cname" class="control-label col-lg-3">Date Paiement</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Etat du Paiement</label>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-3">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="etat_paie" id="etat_paie" value="payer" checked>
                                                    Payé
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-5">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="etat_paie" id="etat_paie" value="non_payer">
                                                    Non Payé
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
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
<?php require_once('foot.php'); ?>