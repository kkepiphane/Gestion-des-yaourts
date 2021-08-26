<?php $title = 'Mon Compte';
require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerCompte.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Compte Société</h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire Modification des Inforùation du Compte</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upCompte.php?idUpdCompte=<?= $lirecompte->id_compte; ?>">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Nom </label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="nomSociet" minlength="2" type="text" value="<?= $lirecompte->nom_societe; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Email</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="mail" minlength="2" type="email" value="<?= $lirecompte->emailSocet; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Adresse</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="adresseSociet" minlength="2" type="text" value="<?= $lirecompte->adresseSociet; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Téléphone</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="telCompt" minlength="2" type="text" value="<?= $lirecompte->telComp; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Produit</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="GestPro" minlength="2" type="text" value="<?= $lirecompte->produitGest; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <button class="btn btn-theme" type="submit" name="btnUpdCompte">Modifier</button>
                                <a href="addCompte.php" class="btn btn-theme04" type="reset">Cancel</a>
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