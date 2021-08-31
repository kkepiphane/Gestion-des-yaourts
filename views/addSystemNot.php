<?php $title = 'Notifications';
require('head.php');
require('header.php');
require('sibar.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Notifications - ajout </h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire Validation Notification</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="notifFom" method="POST" action="">
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Suject </label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="sujet" name="sujet" minlength="2" type="text" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Date avant le jours J</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="dateAvnt" name="dateAvnt" minlength="2" type="date" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Date du Jour J</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="daysD" name="daysD" minlength="2" type="date" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <input type="submit" name="ajouter" id="ajouter" value="Ajouter" class="btn btn-theme">
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
</section>
<?php require_once('foot.php'); ?>