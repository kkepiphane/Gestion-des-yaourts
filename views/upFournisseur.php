<?php $title = 'Fournisseurs';
require_once('main.php');

require('../controller/controllerFournisseur.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Informations Fournisseurs - Modification </h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire Modification</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upFournisseur.php?idUpdCompte=<?= $lireFournisseur->id_four; ?>">
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Nom </label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="nomFour" minlength="2" type="text" value="<?= $lireFournisseur->nom_four; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Adresse</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="adresseFour" minlength="2" type="text" value="<?= $lireFournisseur->adresse_four; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Téléphone</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="telephoneFour" minlength="2" type="text" value="<?= $lireFournisseur->tel_four; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Type Fournisseur</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" name="typeFour">
                                            <option value="<?= $lireFournisseur->typeFourni; ?>"><?= $lireFournisseur->typeFourni; ?></option>
                                            <option value="Etrangé">Etrangé</option>
                                            <option value="Locaux">Locaux</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <button class="btn btn-theme" type="submit" name="btnUpdCompte">Modifier</button>
                                <a href="listeFournisseur.php" class="btn btn-theme04" type="reset">retour</a>
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
<?php require_once('foot.php'); ?>