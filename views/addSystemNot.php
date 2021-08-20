<?php $title = 'Notifications';
require_once('main.php');

require('../controller/controllerNotification.php');
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
                    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerNotification.php">
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Suject </label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="sujet" minlength="2" type="text" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Date avant le jours J</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="dateAvnt" minlength="2" type="date" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Date du Jour J</label>
                                    <div class="col-lg-7">
                                        <input class=" form-control" id="cname" name="daysD" minlength="2" type="date" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset col-lg-8">
                                <button class="btn btn-theme" type="submit" name="btnaddNotification">Ajouter</button>
                                <button class="btn btn-theme04" type="reset">Cancel</button>
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
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout d'un Fournisseur</h4>
                <hr>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th>Suject du notification</th>
                            <th>Date avant le jour J</th>
                            <th>Date du jour J</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allNotifications as $echoNot) : ?>
                            <tr>
                                <td><?= $echoNot->suject_not; ?></td>
                                <td><?= $echoNot->date_debut_noti; ?></td>
                                <td><?= $echoNot->datefin; ?></td>
                                <td>
                                    <a href="upNotifications.php?idUpdNotif=<?= $echoNot->id_not; ?>" onclick="return confirm('Etes-vous sûr de vouloir modifier les informations de notification : <?= $echoNot->suject_not; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="../controller/controllerNotification.php?idDelNot=<?= $echoNot->id_not; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette notification : <?= $echoNot->suject_not; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
<?php require_once('foot.php'); ?>
