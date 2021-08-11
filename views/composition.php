<?php $title = 'Composition';
require('main.php');
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
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th>Yaourt</th>
                            <th>Composition</th>
                            <th>Quantité Produit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allYaourts as $echoListPro) :; ?>
                            <tr>
                                <td><?= $echoListPro->nom_yaourt; ?></td>
                                <td><?= $echoListPro->nom_ing; ?></td>
                                <td><?= $echoListPro->quantiteDispoY; ?> g</td>
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