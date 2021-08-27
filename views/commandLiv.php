<?php $title = 'Livraison';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerCommande.php');
require('../controller/controllerLivreur.php');
require('../controller/controllerClient.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Livraison par commande - Ajout </h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4>
                    <i class="fa fa-angle-right"></i> Formulaire de Validation de Livraison par Commande
                </h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerCommande.php">

                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Ref commande</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" name="id_com_liv" required>
                                            <?php foreach ($echoCom as $lirCom) : ?>
                                                <option value="<?= $lirCom->id_com; ?>"><?= $lirCom->reference_commande; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Nom du Client</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" name="nclient[]" multiple id="multipleCom">
                                            <?php foreach ($allClient as $echoForeiKeyClt) : ?>
                                                <option value="<?= $echoForeiKeyClt->id_client; ?>"><?= $echoForeiKeyClt->nom_client; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Nom du Livreur</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" name="nomLivreur" required>
                                            <option>------------</option>
                                            <?php foreach ($allLiv as $echoForLivreur) : ?>
                                                <option value="<?= $echoForLivreur->idLivreur; ?>"><?= $echoForLivreur->nom_dis; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Date Livraison</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Date Paiment</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="datePaie" minlength="2" type="date" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <button class="btn btn-theme" type="submit" name="btnLivraisonIdCom" onclick="return confirm('Etes-vous sûr de vouloir validé cette Livraison')">Ajouter</button>
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
    <!-- /row -->
</section>
<?php require('foot.php'); ?>

<script>
    $(function() {
        $('#multipleCom').multipleSelect();
    });
</script>