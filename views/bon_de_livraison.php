<?php $title = 'Commande';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerCommande.php');
?>

<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Commande - Liste des Commandes</h3>
    <!-- row -->
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4>
                    <i class="fa fa-angle-right"></i><b>Listes des commande disponible</b>
                </h4>
                <hr>

                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Date Commande</th>
                            <th> Produit</th>
                            <th> Bon de Livraison</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comlivre as $echoComD) : ?>
                            <tr>
                                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->reference_commande ?></td>
                                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->date_com ?></td>
                                <?php
                                $cltComid = $echoComD->id_com;
                                $db = dbConnect();
                                $query = $db->prepare("SELECT * FROM commande, distribu_com,clients WHERE distribu_com.id_com_liv  = commande.id_com AND distribu_com.id_clt = clients.id_client  AND commande.id_com  = '" . $cltComid . "'");
                                $query->execute();
                                $idCltDate = $query->fetchall(PDO::FETCH_OBJ);

                                foreach ($idCltDate as $dayClt) :;
                                ?>
                            <tr>
                                <td><?= $dayClt->nom_client ?></td>
                                <td>
                                    <a href="factureComPaie.php?id_fac_paie=<?= $dayClt->id_clt  ?>" class="btn btn-success btn-xs" title="Cliqué pour faire livré"><i class="fa fa-building-o"></i></a>
                                </td>
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
    <!-- /row -->
</section>
<?php require('foot.php'); ?>