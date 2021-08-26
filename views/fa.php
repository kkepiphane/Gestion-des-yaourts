<?php $title = 'Facture des Achats';
require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerFactureAchat.php');


?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Facture Achats - Ajout</h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire de Validations</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerFactureAchat.php">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Fournisseurs</label>
                                    <div class="col-lg-7">
                                        <select class=" form-control" name="idFour" id="fournisseur" onchange="fournisseurOnchange(this.value)">
                                            <option>------------</option>
                                            <?php foreach ($allFournis as $FourniLire) : ?>
                                                <option value="<?= $FourniLire->id_four; ?>"><?= $FourniLire->nom_four; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Date</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="dateAch" minlength="2" type="date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">N° Facture</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="refFact" id="demo" minlength="2" type="text" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="input-field">
                                    <table id="row_input">
                                        <tr>
                                            <th width="35%"></th>
                                            <th width="34%"></th>
                                            <th width="28%"></th>
                                            <th width="28%"></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-3">Ingrédiant</label>
                                                    <div class="col-lg-7">
                                                        <select name="refIng[]" class="form-control" onchange="ingredOnchange(this.value)">

                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-3">P Unitaire</label>
                                                    <div class="col-lg-7">
                                                        <input class=" form-control" id="prixU" name="prixU[]" min="1" minlength="2" type="number" required="" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-3">Quantité</label>
                                                    <div class="col-lg-7">
                                                        <input class=" form-control" id="quantiteIng" name="quantiteIng[]" min="1" minlength="2" type="number" required="" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <input class="btn btn-theme" type="button" name="addFactA" id="addFactA" value="Ajout" />
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset col-lg-8">
                                        <input class="btn btn-success" type="submit" name="saveFacA" id="saveFacA" value="Enregistrer" />
                                    </div>
                                </div>
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
                        <?php foreach ($getOneFacture as $echo_fact) : ?>
                            <tr>
                                <td><?= $echo_fact->designation_ach; ?></td>
                                <td><?= $echo_fact->dateFactAchat; ?></td>
                                <td><?= $echo_fact->nom_four; ?></td>
                                <td>
                                    <a href="upFactureAcht.php?idUpdFacA=<?= $echo_fact->id_fac_ach; ?>" onclick="return confirm('Etes-vous sûr de vouloir apporter la modification à la factutre : <?= $echo_fact->designation_ach; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="facture_achats.php?idFactureInfo=<?= $echo_fact->id_fac_ach; ?>" onclick="return confirm('Etes-vous sûr de vouloir voir et imprimer la factutre : <?= $echo_fact->designation_ach; ?>')" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
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
        /**
         * Cette fonction permet d'ajout la notification et d'ajouter
         */
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


        /**
         * Ici cette methode c'est pour d'ajouter les input pour l'ajout des ingrédiant et la quantité
         * 
         */
        var html = '<tr><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Ingrédiant</label><div class="col-lg-7"><select name="refIng[]" class="form-control" required><option value=""></option></select></div></div></td> <td><div class="form-group "><label for="cname" class="control-label col-lg-3">P Unitaire</label><div class="col-lg-7"><input class=" form-control" id="prixU" name="prixU[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Quantité</label><div class="col-lg-7"><input class=" form-control" id="quantiteIng" name="quantiteIng[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><input class="btn btn-danger btn-xs" type="button" name="delFac" id="delFac" value="Supprimer" /></div></td></tr>';

        var x = 1;
        /**
         * Cette fonction permet d'ajouter 
         */
        $("#addFactA").click(function() {
            $("#row_input").append(html);
        });
        $("#row_input").on('click', '#delFac', function() {
            $(this).closest('tr').remove();
        });
    });




    //cette fonction permet de selectionné et de mettre les données dans les champs
    function fournisseurOnchange(id) {
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
    //cette fonction permet de selectionné et de mettre les données dans les champs
    function IngredOnchange(id) {
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