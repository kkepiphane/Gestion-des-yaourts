<?php $title = 'Livraison';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerLivraison.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Livraison - Liste </h3>
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fa fa-angle-right"></i><b>Listes des distributions</b>
                        </div>
                        <div class="col-lg-2">
                            <a href="addFacture_distribution.php" class="btn btn-warning outline" title="Cliqué pour faire la Facture"><i class="fa fa-hand-o-right"></i> faire La facture</a>
                        </div>
                    </div>
                </h4>
                <hr>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th width="6%">Date Livraison</th>
                            <th width="6%">Date Paiement</th>
                            <th width="5%"> Client</th>
                            <th width="5%">Livreur</th>
                            <th width="6%">Bon de Livraison</th>
                            <th width="5%">Etat Paiement</th>
                            <th width="5%">Facture</th>
                            <th width="10%"> Produit</th>
                            <th width="10%"> Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tousDis as $echoDistribut) : ?>
                            <tr>
                                <td rowspan="<?= $echoDistribut->comId + 1; ?>"><?= $echoDistribut->date_livraison ?></td>
                                <td rowspan="<?= $echoDistribut->comId + 1; ?>">
                                    <?php
                                    if ($echoDistribut->date_paiment === '0000-00-00') {
                                        echo "pas de date fixé";
                                    } else {
                                        echo $echoDistribut->date_paiment;
                                    }

                                    ?>
                                </td>
                                <td rowspan="<?= $echoDistribut->comId + 1; ?>"><?= $echoDistribut->nom_client ?></td>
                                <td rowspan="<?= $echoDistribut->comId + 1; ?>"><?= $echoDistribut->nom_dis ?></td>
                                <td rowspan="<?= $echoDistribut->comId + 1; ?>">
                                    <a href="bon_liv_line.php?id_bon_livraison=<?= $echoDistribut->idDis ?>" class="btn btn-info btn-xs"><i class="fa fa-shopping-cart"></i></a>
                                </td>
                                <td rowspan="<?= $echoDistribut->comId + 1; ?>">

                                    <?php
                                    $etatPaieEt = $echoDistribut->etat_paie_Dis;
                                    if ($etatPaieEt == "payer") :; ?>
                                        <span class="label label-primary label-mini">Payé</span>
                                    <?php else : ?>
                                        <span class="label label-danger label-mini">Non Payé</span>
                                    <?php endif; ?>
                                </td>
                                <td rowspan="<?= $echoDistribut->comId + 1; ?>">
                                    <?php
                                    $etatPaieEt = $echoDistribut->etat_paie_Dis;
                                    if ($etatPaieEt == "payer") :; ?>
                                        <a href="bon_liv_line.php?id_bon_livraison=<?= $echoDistribut->idDis ?>" class="btn btn-success btn-xs"><i class="fa fa-building-o"></i></a>
                                    <?php else : ?>
                                        <a href="addFacture_distribution.php" class="btn btn-warning btn-xs" title="Cliqué pour faire la Facture"><i class="fa fa-hand-o-right"></i> faire La facture</a>
                                    <?php endif; ?>
                                </td>
                                <?php
                                $idD = $echoDistribut->idDis;
                                $db = dbConnect();
                                $query = $db->prepare("SELECT * FROM distributions, livreur, clients, distribu_produit, produits WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client AND distribu_produit.id_distribu  = distributions.idDis AND distributions.idDis = ? AND distribu_produit.idProduits_dis = produits.id_prod");
                                $query->execute(array($idD));
                                $proDis = $query->fetchall(PDO::FETCH_OBJ);

                                foreach ($proDis as $produitD) :;
                                ?>
                            <tr>
                                <td><?= $produitD->id_yaourt ?></td>
                                <td><?= $produitD->quantite_venduPro ?></td>
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