<?php $title = 'Facture des Achats';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerFactureAchat.php');

?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Facture Achats - Ajout</h3>
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
                        <?php foreach ($getAllFactureA as $echo_fact) : ?>
                            <tr>
                                <td><?= $echo_fact->designation_ach; ?></td>
                                <td><?= $echo_fact->dateFactAchat; ?></td>
                                <td><?= $echo_fact->nom_four; ?></td>
                                <td>
                                    <a href="upFactureAcht.php?idUpdFacA=<?= $echo_fact->id_fac_ach; ?>" onclick="return confirm('Etes-vous sûr de vouloir apporter la modification à la factutre : <?= $echo_fact->designation_ach; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="facture_achats.php?idFactureInfo=<?= $echo_fact->id_fac_ach; ?>" onclick="return confirm('Etes-vous sûr de vouloir voir et imprimer la factutre : <?= $echo_fact->designation_ach; ?>')" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>
                                    <a href="suFactureAchats.php?idFactureInfo=<?= $echo_fact->id_fac_ach; ?>" onclick="return confirm('Etes-vous sûr de vouloir voir et imprimer la factutre : <?= $echo_fact->designation_ach; ?>')" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
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
<script src="../public/node_modules/multiple-select/dist/multiple-select.min.js"></script>
<script>
    $(function() {
        $('.multipleM').multipleSelect()
    });
</script>
<script type="text/javascript">
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