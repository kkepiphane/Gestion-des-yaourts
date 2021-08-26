<?php $title = 'Fournisseurs';
require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerFournisseur.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Fournisseurs - Liste </h3>
    <!-- /row -->
    <!-- row -->
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Listes des d'un Fournisseur</h4>
                <hr>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th>Nom Fournisseur</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Type Fournisseur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allFournis as $echoF) :; ?>
                            <tr>
                                <td><?= $echoF->nom_four; ?></td>
                                <td><?= $echoF->adresse_four; ?></td>
                                <td><?= $echoF->tel_four; ?></td>
                                <td><?= $echoF->typeFourni; ?></td>
                                <td>
                                    <a href="upFournisseur.php?idUpdCompte=<?= $echoF->id_four; ?>" onclick="return confirm('Êtes-vous sûr de vouloir modifier le Founisseur : <?= $echoF->nom_four; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="../controller/controllerFournisseur.php?idDelFournListe=<?= $echoF->id_four; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le Founisseur : <?= $echoF->nom_four; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
<?php require_once('foot.php'); ?>