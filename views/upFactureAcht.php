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
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upFactureAcht.php?idUpdFacA=<?= $lireUpdFact->id_fac_ach; ?>">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Fournisseurs</label>
                                    <div class="col-lg-7">
                                        <select class=" form-control" name="idFour" id="fournisseur" onchange="myFunction(this.value)">
                                            <option value="<?= $lireUpdFact->id_four; ?>"><?= $lireUpdFact->nom_four; ?></option>
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
                                        <input class=" form-control" id="cname" name="dateAch" minlength="2" type="date" value="<?= $lireUpdFact->dateFactAchat; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">N° Facture</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="refFact" id="demo" minlength="2" type="text" value="<?= $lireUpdFact->designation_ach; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-8">
                                <button class="btn btn-theme" type="submit" name="idUpdFactAcha">Suivant</button>
                                <a href="addFactureAchat.php" class="btn btn-theme04" type="reset">Retour</a>
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
    <!-- row -->
    <!-- FORM VALIDATION -->
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