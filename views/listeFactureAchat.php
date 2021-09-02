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
                <table class="table table-striped table-advance table-hover" id="TbFactureAch">
                    <thead>
                        <tr>
                            <th>Désignation Facture</th>
                            <th>Date Facture</th>
                            <th>Fournisseur</th>
                            <th>Imprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getAllFactureA as $echo_fact) : ?>
                            <tr>
                                <td><?= $echo_fact->designation_ach; ?></td>
                                <td><?= $echo_fact->dateFactAchat; ?></td>
                                <td><?= $echo_fact->nom_four; ?></td>
                                <td>
                                    <a href="facture_achats.php?idFactureInfo=<?= $echo_fact->id_fac_ach; ?>" onclick="return confirm('Etes-vous sûr de vouloir voir et imprimer la factutre : <?= $echo_fact->designation_ach; ?>')" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>
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
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/multiple-select.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->

<script src="../public/js-ui/DataTables/datatables.min.js"></script>
<script src="../public/js-ui/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../public/js-ui/Customizable-Analog-Clock-with-jQuery/js/jquery.thooClock.js"></script>

<script>
    $(document).ready(function() {
        $("#TbFactureAch").dataTable();
    });
</script>

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

    });
</script>
<script>
    //cette fonction permet de selectionné et de mettre les données dans les champs
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
</body>

</html>