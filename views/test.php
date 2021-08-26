<?php $title = 'Facture des Achats';
require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerFactureAchat.php');


?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Facture Achats - Ajout</h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire de Validations</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerFactureAchat.php">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Fournisseurs</label>
                                    <div class="col-lg-7">
                                        <select class=" form-control" name="idFour" id="fournisseur" onchange="myFunction(this.value)">
                                            <option>------------</option>
                                            <?php foreach ($allFour as $FourniLire) : ?>
                                                <option value="<?= $FourniLire->id_four; ?>"><?= $FourniLire->nom_four; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Date</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="dateAch" minlength="2" type="date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">N° Facture</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="refFact" id="demo" minlength="2" type="text" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Listes des Ingrédiants</label>
                                    <div class="col-lg-7">
                                        <select multiple="multiple" class=" form-control" name="idIngrd[]" id="ingred">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-8">
                                <button class="btn btn-theme" type="submit" name="btnRef_FacAcht">Suivant</button>
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
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire de Validations Produit</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerFactureAchat.php">
                        <?php foreach ($lisIng as $echoRefF) :; ?>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Ingrédiant</label>
                                        <div class="col-lg-7">
                                            <select class="multipleM" name="refIng[]" multiple>
                                                <option value="<?= $echoRefF->id_ing; ?>"><?= $echoRefF->references_ing; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Prix Unitaire</label>
                                        <div class="col-lg-7">
                                            <input class=" form-control" id="cname" name="prixU[]" minlength="2" type="number" value="<?= $echoRefF->prixUnitaire; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Quantité</label>
                                        <div class="col-lg-7">
                                            <input class=" form-control" id="cname" name="quantiteIng[]" minlength="2" type="number" value="<?= $echoRefF->quantite_dispo; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-8">
                                <button class="btn btn-theme" type="submit" name="btnAddFactProd">Ajouter</button>
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
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout d'un Fournisseur</h4>
                <hr>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th>Désignation Facture</th>
                            <th>Date Facture</th>
                            <th>Fournisseur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getOneFacture as $echo_fact) : ?>
                            <tr>
                                <td><?= $echo_fact->designation_ach; ?></td>
                                <td><?= $echo_fact->dateFactAchat; ?></td>
                                <td><?= $echo_fact->nom_four; ?></td>
                                <td>
                                    <a href="upFactureAcht.php?idUpdFacA=<?= $echo_fact->id_fac_ach; ?>" onclick="return confirm('Etes-vous sûr de vouloir apporter la modification à la factutre : <?= $echo_fact->designation_ach; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="facture_achats.php?idFactureInfo=<?= $echo_fact->id_fac_ach; ?>" onclick="return confirm('Etes-vous sûr de vouloir voir et imprimer la factutre : <?= $echo_fact->designation_ach; ?>')" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
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
<script>
    //cette fonction permet de selectionné et de mettre les données dans les champs
    function myFunction(id) {
        $('#ingred').html('');
        $.ajax({
            type: 'POST',
            url: '../controller/controllerFactureAchat.php',
            data: {
                id_fourSS: id
            },
            success: function(data) {
                $('#ingred').html(data);
            }
        })
    }
</script>