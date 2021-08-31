<?php $title = 'Facture';

require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerFacturePaie.php');
?>

<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Facture des distributions</h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire de Validation</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerFacturePaie.php">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Ref Facture</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="cname" name="ref_fact_dis" minlength="2" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Ref Distribution</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="dis_prod" id="dis_prod">
                                            <option>------------</option>
                                            <?php foreach ($LireDis as $keyDis) : ?>
                                                <option Value="<?= $keyDis->idDis; ?>"><?= $keyDis->ref_dis; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Client</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="client_dis" id="client_dis">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Date Paiement</label>
                                    <div class="col-lg-6" id="dateLpaie">
                                        <input class=" form-control" id="dateLiv" name="dateLiv" minlength="2" type="date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Etat du Paiement</label>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-3">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="etat_paie" id="etat_paie" value="payer" checked>
                                                    Payé
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-5">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="etat_paie" id="etat_paie" value="non_payer">
                                                    Non Payé
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <button class="btn btn-theme" type="submit" name="bttAddFactDisDirect">Ajouter</button>
                                <button class="btn btn-theme04" onclick="document.location.reload()" type="reset">Annuler</button>
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
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/multiple-select.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="lib/gritter-conf.js"></script>
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
                alert("les Données sont pas entrées veuiller vérifié les champs");
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


        $('#dis_prod').change(function() {
            var IDClient = $(this).val();
            $.ajax({
                type: 'POST',
                url: '../controller/controllerFacturePaie.php',
                data: {
                    clientDiss: IDClient
                },
                dataType: "text",
                success: function(data) {
                    $('#client_dis').html(data);
                }
            });
        });

        $('#dis_prod').change(function() {
            var IDDiss = $(this).val();
            $.ajax({
                type: 'POST',
                url: '../controller/controllerFacturePaie.php',
                data: {
                    datePaieDissss: IDDiss
                },
                dataType: "text",
                success: function(data) {
                    $('#dateLpaie').html(data);
                }
            });
        });
    });
</script>
</body>

</html>