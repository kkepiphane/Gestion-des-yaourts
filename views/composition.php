<?php $title = 'Composition';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerYaourt.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Composition - Liste </h3>
    <!-- /row -->
    <!-- row -->
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Listes des Produit disponible</h4>
                <hr>
                <table class="table table-striped table-advance table-hover" width="100%" cellspacing="0" cellpadding="5">
                    <thead>
                        <tr>
                            <th>Yaourt</th>
                            <th>Composition</th>
                            <th>Quantité Produit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allYaoComp as $echoListPro) :; ?>
                            <tr>
                                <td rowspan="<?= $echoListPro->compTab; ?>">
                                    <?= $echoListPro->nom_yaourt; ?></td>
                                <?php

                                $db = dbConnect();
                                $query = $db->prepare("SELECT * FROM yaourt, type_yaout, prod_fac_achats, ingrediants  WHERE yaourt.idType_yaourt = type_yaout.id_ty AND prod_fac_achats.id_ingred_achts  = ingrediants.id_ing AND yaourt.id_ingred = prod_fac_achats.id_ingred_achts AND yaourt.idType_yaourt = ?  GROUP BY yaourt.idType_yaourt,yaourt.id_ingred ORDER BY nom_yaourt");
                                $query->execute(array($echoListPro->idType_yaourt));
                                $aaa = $query->fetchall(PDO::FETCH_OBJ);
                                foreach ($aaa as $echoListComp) :;
                                ?>
                                    <td><?= $echoListComp->nom_ing; ?></td>
                                    <td><?= $echoListComp->quantiteDispoY; ?></td>
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