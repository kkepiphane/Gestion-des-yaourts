<?php $title = 'Livraison';
require('main.php');
require('../controller/controllerProduit.php');
require('../controller/controllerCommande.php');
require('../controller/controllerLivreur.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Livraison - Ajout </h3>

    <div class="row mt">
        <div class="col-md-12">
            <h4><i class="fa fa-angle-right"></i>Commande</h4>
            <div class="content-panel">
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <b>Date commande: </b><?= $echoCom->date_com; ?>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <b>Nom Client: </b><?= $echoCom->nom_client; ?> <br><br>

                                <b>Adresse : </b><?= $echoCom->adresse_client; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <b>Produit : </b><?= $echoCom->nom_yaourt; ?>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <b>Quantité :</b><?= $echoCom->quantite; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
    </div>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire de Validation - Livraison</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerLivraison.php?idADLivraison=<?= $echoCom->id_com; ?>">
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Date Livraison</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Date Paiment</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="cname" name="datePaie" minlength="2" type="date" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Nom du Livreur</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="nomLivreur">
                                            <option>------------</option>
                                            <?php foreach ($allLiv as $echoForLivreur) : ?>
                                                <option value="<?= $echoForLivreur->idLivreur; ?>"><?= $echoForLivreur->nom_dis; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Quantité</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="cname" name="quantitePro" minlength="2" type="number" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <button class="btn btn-theme" type="submit" name="btnAddLivraison">Ajouter</button>
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
                            <th>Quantité Produit</th>
                            <th>Prix</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aDproduit as $echoLirePro) :; ?>
                            <tr>
                                <td><?= $echoLirePro->nom_yaourt; ?></td>
                                <td><?= $echoLirePro->quantite_pro; ?></td>
                                <td><?= $echoLirePro->prix_produit; ?></td>
                                <td></td>
                                <td>
                                    <a href="" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                                    <a href="upProduit.php?idUpdProd=<?= $echoLirePro->id_prod; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="../controller/controllerProduit.php?idDel_Prod=<?= $echoLirePro->id_prod; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
<?php require('foot.php'); ?>