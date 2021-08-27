<?php
$title = 'Facture des Achats';
require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerCompte.php');
require('../controller/controllerCommande.php');
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
                                    <b>Référence Commande : </b><?= $comFacturePaie->reference_commande; ?><br>
                                    <b>Date du Commande : </b> <?= $comFacturePaie->date_com; ?> <br>
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
                                    <i class="fa fa-angle-right"></i><b> Facutre du Client :</b> <?= $comFacturePaie->nom_client; ?>
                                </h4>
                                <hr>
                                <table class="table table-striped table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th> Produit</th>
                                            <th> Quantité</th>
                                            <th>Prix Unitaire</th>
                                            <th>Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($aDcoms as $echoComD) : ?>
                                            <tr>
                                                <?php
                                                $cltComid = $echoComD->id_com;
                                                $db = dbConnect();
                                                $query = $db->prepare("SELECT * FROM commande, produits, prod_commande WHERE prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod AND livraison like '%non_livre%' AND commande.id_com = '" . $cltComid . "'");
                                                $query->execute();
                                                $idCltDate = $query->fetchall(PDO::FETCH_OBJ);

                                                foreach ($idCltDate as $dayClt) :;
                                                ?>
                                            <tr>
                                                <td><?= $dayClt->id_yaourt ?></td>
                                                <td><?= $dayClt->quantite_com ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
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
        <div class="col-xs-6 col-sm-7"></div>
        <div class="col-xs-6 col-sm-3">
            <a href="addFactureAchat.php" class="btn btn-theme04 btn-xs">Retour</a>
        </div>
        <div class="col-xs-6 col-sm-2">
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