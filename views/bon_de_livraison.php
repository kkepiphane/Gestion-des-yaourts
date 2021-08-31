<?php $title = 'Commande';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerCommande.php');
?>

<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Commande - Liste des Commandes Livré</h3>
    <!-- row -->
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fa fa-angle-right"></i><b>Listes des commande Livré</b>
                        </div>
                        <div class="col-lg-2">
                            <a href="addFacture.php" class="btn btn-warning outline" title="Cliqué pour faire la Facture"><i class="fa fa-hand-o-right"></i> faire La facture</a>
                        </div>
                    </div>
                </h4>
                <hr>

                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Date Commande</th>
                            <th> Client</th>
                            <th> Etat Paiement</th>
                            <th> Bon de Livraison</th>
                            <th> Facture</th>
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
                                    <?php
                                    $etatPaie = $dayClt->etat_paiement;
                                    if ($etatPaie == "payer") :; ?>
                                        <span class="label label-primary label-mini">Payé</span>
                                    <?php else : ?>
                                        <span class="label label-danger label-mini">Non Payé</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="factureComPaie.php?id_fac_paie=<?= $dayClt->id_dis_com; ?>" class="btn btn-info btn-xs" title="Cliqué pour faire livré"><i class="fa fa-shopping-cart"></i></a>
                                </td>
                                <td>

                                    <?php
                                    $etatPaie = $dayClt->etat_paiement;
                                    if ($etatPaie == "payer") :; ?>
                                        <a href="factureCommandePaie.php?id_fac_paie_com=<?= $dayClt->id_dis_com ?>" class="btn btn-success btn-xs" title="Cliqué pour faire livré"><i class="fa fa-building-o"></i></a>
                                    <?php else : ?>
                                        <a href="addFacture.php" class="btn btn-warning btn-xs" title="Cliqué pour faire la Facture"><i class="fa fa-hand-o-right"></i> faire La facture</a>
                                    <?php endif; ?>
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
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/DataTables/datatables.min.js"></script>
<script src="../public/DataTables/DataTables-1.11.0/js/dataTables.jqueryui.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->
<script>
    $(document).ready(function() {
        function load_unseen_notification(view = '') {
            $.ajax({
                url: "../controller/controllerNotification.php",
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('.dropdown-menu').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }
        load_unseen_notification();
        $('#notifFom').on('submit', function(event) {
            event.preventDefault();
            if ($('#sujet').val() != '' && $('#dateAvnt').val() != '') {
                var form_data = $(this).serialize();
                $.ajax({
                    url: "../controller/controllerNotification.php",
                    method: "POST",
                    data: form_data,
                    success: function() {
                        $('#notifFom')[0].reset();
                        load_unseen_notification();
                    }
                })
            } else {
                alert("les Données sont pas entrées veuillet vérifié les champs");
            }
        });
        //Lorsqu on click on a affiche plus la notification
        $(document).on('click', '.dropdown-toggle', function() {
            $('.count').html('');
            load_unseen_notification('yes');
        })
        setInterval(function() {
            load_unseen_notification();
        }, 5000);

        $('#myTable').DataTable();

    });
</script>
</body>

</html>