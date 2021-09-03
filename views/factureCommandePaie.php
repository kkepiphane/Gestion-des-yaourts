<?php
$title = 'Facture des Achats';
require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerCompte.php');
require('../controller/controllerFacturePaie.php');
?>

<section class="wrapper">
    <div id='sectionAimprimer'>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <?php foreach ($allCompte as $Compte) :; ?>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6">
                                        <b><?= $Compte->nom_societe; ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6">
                                        <?= $Compte->telComp; ?> <br>
                                        <?= $Compte->emailSocet; ?><br>
                                        <?= $Compte->adresseSociet; ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6">
                                    <b>Facture : </b><?= $factCommmm->designation_paie; ?><br>
                                    <b>Date du Paiment : </b> <?= $factCommmm->date_paiment_com; ?> <br>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row mt">
                        <div class="col-md-12">
                            <div class="content-panel">
                                <h4>
                                    <i class="fa fa-angle-right"></i><b>Facture du Client :</b> <?= $factCommmm->nom_client; ?>
                                </h4>
                                <hr>
                                <table class="table table-striped table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th> Ref Produit</th>
                                            <th> Produit</th>
                                            <th> Quantité</th>
                                            <th>Prix Unitaire</th>
                                            <th>Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sommeT = 0;
                                        foreach ($factprooodFactt as $echoFacCom) : ?>
                                            <tr>
                                                <td><?= $echoFacCom->ref_yaourt; ?></td>
                                                <td><?= $echoFacCom->nom_yaourt ?></td>
                                                <td><?= $echoFacCom->quantite_com ?></td>
                                                <td><?= $echoFacCom->prix_produit ?></td>
                                                <td><?= $echoFacCom->prix_produit * $echoFacCom->quantite_com;
                                                    $sommeT = $echoFacCom->prix_produit * $echoFacCom->quantite_com + $sommeT;

                                                    ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Montant Total</th>
                                            <th><?= $sommeT; ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /content-panel -->
                        </div>
                        <!-- /col-md-12 -->
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-7"></div>
                        <div class="col-xs-6 col-sm-3">Signature : </div>
                        <div class="col-xs-6 col-sm-2"></div>
                    </div>
                    &copy;<?= $Compte->nom_societe; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 col-sm-6"></div>
        <div class="col-xs-5 col-sm-3">
            <a href="bon_de_livraison.php" class="btn btn-theme04 btn-xs">Retour</a>
        </div>
        <div class="col-xs-3 col-sm-2">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-success btn-xs">Imprimer</button>
        </div>
    </div>
    <?php require('foot.php'); ?>
    <script>
        function imprimer(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>