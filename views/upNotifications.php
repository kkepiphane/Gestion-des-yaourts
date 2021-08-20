<?php $title = 'Notifications';
require_once('main.php');

require('../controller/controllerNotification.php');
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Notifications - Modification </h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4><i class="fa fa-angle-right"></i> Formulaire Modification Notification</h4>
                <hr>
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="upNotifications.php?idUpdNotif=<?= $lireUpdNot->id_not; ?>">
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Suject </label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="sujet" minlength="2" type="text" value="<?= $lireUpdNot->suject_not; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Date avant le jours J</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="dateAvnt" minlength="2" type="date" value="<?= $lireUpdNot->date_debut_noti; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Date du Jour J</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="daysD" minlength="2" type="date" value="<?= $lireUpdNot->datefin; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <button class="btn btn-theme" type="submit" name="btnUpdNotification">Modifier</button>
                                <a href="addSystemNot.php" class="btn btn-theme04" type="reset">Cancel</a>
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
    <!-- /row -->
</section>
<?php require_once('foot.php'); ?>