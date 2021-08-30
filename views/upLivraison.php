<?php $title = 'Livraison';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerLivraison.php');
require('../controller/controllerLivreur.php');
require('../controller/controllerClient.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Livraison - Modification </h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire de Modification</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upLivraison.php?id_upd_livraison=<?= $lire_upd_livraison->idDis; ?>">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Ref Distribution</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="ref_dis" minlength="2" type="text" value="<?= $lire_upd_livraison->ref_dis; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Date Livraison</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date" value="<?= $lire_upd_livraison->date_livraison; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Date Paiment</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="datePaie" minlength="2" type="date" value="<?= $lire_upd_livraison->date_paiment; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Nom du Client</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="nomClient">
                                            <option value="<?= $lire_upd_livraison->id_client; ?>"><?= $lire_upd_livraison->nom_client; ?></option>
                                            <?php foreach ($allClient as $echoFoerIng) : ?>
                                                <option value="<?= $echoFoerIng->id_client; ?>"><?= $echoFoerIng->nom_client; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Nom du Livreur</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="nomLivreur">
                                            <option value="<?= $lire_upd_livraison->idLivreur; ?>"><?= $lire_upd_livraison->nom_dis; ?></option>
                                            <?php foreach ($allLiv as $echoForLivreur) : ?>
                                                <option value="<?= $echoForLivreur->idLivreur; ?>"><?= $echoForLivreur->nom_dis; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <input class="btn btn-success" type="submit" name="upLivraison" id="upLivraison" value="Modifier" />
                                <a href="addLivraison.php" class="btn btn-theme04" type="reset">Retour</a>
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
        var html = '<tr><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Produit</label><div class="col-lg-7"><select name="produit[]" class="form-control" required><?php foreach ($allProds as $echoForeiKeyClt) : ?><option value="<?= $echoForeiKeyClt->id_prod; ?>"><?= $echoForeiKeyClt->id_yaourt; ?> </option><?php endforeach; ?></select></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Quantité</label><div class="col-lg-7"><input class=" form-control" id="quantiteIng" name="quantite[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><input class="btn btn-danger btn-xs" type="button" name="delFac" id="delFac" value="Supprimer" /></div></td></tr>';

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
    //Cette fonction permet de vérifier la quantité de produit
    function selectIngrediant(id) {
        $('#quantiteDispo').html('');
        $.ajax({
            type: 'POST',
            url: '../controller/controllerCommande.php',
            data: {
                idQuantitPro: id
            },
            success: function(data) {
                $('#quantiteDispoPro').html(data);
            }
        })
    }
    //Cette fonction permet de vérifier la valeur supérieur ou inférieur
    $('#Qvend').change(function() {
        $(document).ready(function() {
            $("input").attr({
                "max": $('#quanRecapDiso').val(),
                "min": 1
            });
        });
    });

    $(function() {
        $('#multipleM').multipleSelect();
    });
</script>
</body>

</html>